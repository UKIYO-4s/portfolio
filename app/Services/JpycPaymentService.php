<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class JpycPaymentService
{
    // JPYC Contract Address on Polygon
    private const JPYC_CONTRACT = '0x431D5dfF03120AFA4bDf332c61A6e1766eF37BDB';

    // ERC-20 Transfer event signature
    private const TRANSFER_EVENT_SIGNATURE = '0xddf252ad1be2c89b69c2b068fc378daa952ba7f163c4a11628f55a4df523b3ef';

    private string $rpcUrl;
    private string $receiverAddress;

    public function __construct()
    {
        $this->rpcUrl = config('services.polygon.rpc_url');
        $this->receiverAddress = strtolower(config('services.jpyc.receiver_address'));
    }

    /**
     * Verify a JPYC payment transaction
     *
     * @param string $txHash Transaction hash
     * @param int $expectedAmount Expected amount in JPYC (1 JPYC = 1 unit, no decimals for display)
     * @return array{valid: bool, message: string, sender?: string, amount?: string}
     */
    public function verifyPayment(string $txHash, int $expectedAmount): array
    {
        try {
            // Get transaction receipt
            $receipt = $this->getTransactionReceipt($txHash);

            if (!$receipt) {
                return ['valid' => false, 'message' => 'Transaction not found or not yet confirmed'];
            }

            // Check if transaction was successful
            if ($receipt['status'] !== '0x1') {
                return ['valid' => false, 'message' => 'Transaction failed'];
            }

            // Parse logs to find JPYC transfer
            $transferInfo = $this->parseTransferLogs($receipt['logs']);

            if (!$transferInfo) {
                return ['valid' => false, 'message' => 'No JPYC transfer found in transaction'];
            }

            // Verify receiver address
            if (strtolower($transferInfo['to']) !== $this->receiverAddress) {
                return [
                    'valid' => false,
                    'message' => 'Payment was sent to wrong address'
                ];
            }

            // JPYC has 18 decimals
            $amountInJpyc = bcdiv($transferInfo['amount'], bcpow('10', '18'), 0);

            // Verify amount (allow small variance for gas)
            if ((int)$amountInJpyc < $expectedAmount) {
                return [
                    'valid' => false,
                    'message' => "Insufficient amount. Expected: {$expectedAmount} JPYC, Received: {$amountInJpyc} JPYC"
                ];
            }

            return [
                'valid' => true,
                'message' => 'Payment verified successfully',
                'sender' => $transferInfo['from'],
                'amount' => $amountInJpyc
            ];

        } catch (\Exception $e) {
            Log::error('JPYC payment verification failed', [
                'tx_hash' => $txHash,
                'error' => $e->getMessage()
            ]);

            return ['valid' => false, 'message' => 'Verification failed: ' . $e->getMessage()];
        }
    }

    /**
     * Get transaction receipt from Polygon RPC
     */
    private function getTransactionReceipt(string $txHash): ?array
    {
        $response = Http::post($this->rpcUrl, [
            'jsonrpc' => '2.0',
            'method' => 'eth_getTransactionReceipt',
            'params' => [$txHash],
            'id' => 1
        ]);

        if (!$response->successful()) {
            throw new \Exception('RPC request failed');
        }

        $data = $response->json();

        if (isset($data['error'])) {
            throw new \Exception($data['error']['message'] ?? 'RPC error');
        }

        return $data['result'] ?? null;
    }

    /**
     * Parse transfer logs to find JPYC transfer
     */
    private function parseTransferLogs(array $logs): ?array
    {
        foreach ($logs as $log) {
            // Check if this is from JPYC contract
            if (strtolower($log['address']) !== strtolower(self::JPYC_CONTRACT)) {
                continue;
            }

            // Check if this is a Transfer event
            if (!isset($log['topics'][0]) || $log['topics'][0] !== self::TRANSFER_EVENT_SIGNATURE) {
                continue;
            }

            // Transfer event: Transfer(address indexed from, address indexed to, uint256 value)
            // topics[1] = from, topics[2] = to, data = value
            $from = '0x' . substr($log['topics'][1], 26);
            $to = '0x' . substr($log['topics'][2], 26);
            $amount = $this->hexToDec($log['data']);

            return [
                'from' => $from,
                'to' => $to,
                'amount' => $amount
            ];
        }

        return null;
    }

    /**
     * Convert hex string to decimal string (for big numbers)
     */
    private function hexToDec(string $hex): string
    {
        $hex = ltrim($hex, '0x');
        $dec = '0';
        $len = strlen($hex);

        for ($i = 0; $i < $len; $i++) {
            $dec = bcmul($dec, '16');
            $dec = bcadd($dec, (string)hexdec($hex[$i]));
        }

        return $dec;
    }

    /**
     * Get the receiver wallet address
     */
    public function getReceiverAddress(): string
    {
        return $this->receiverAddress;
    }

    /**
     * Check if a transaction exists and get its confirmation count
     */
    public function getTransactionConfirmations(string $txHash): ?int
    {
        try {
            // Get transaction
            $response = Http::post($this->rpcUrl, [
                'jsonrpc' => '2.0',
                'method' => 'eth_getTransactionByHash',
                'params' => [$txHash],
                'id' => 1
            ]);

            $txData = $response->json()['result'] ?? null;

            if (!$txData || !isset($txData['blockNumber'])) {
                return null;
            }

            // Get current block number
            $blockResponse = Http::post($this->rpcUrl, [
                'jsonrpc' => '2.0',
                'method' => 'eth_blockNumber',
                'params' => [],
                'id' => 2
            ]);

            $currentBlock = hexdec($blockResponse->json()['result'] ?? '0x0');
            $txBlock = hexdec($txData['blockNumber']);

            return $currentBlock - $txBlock + 1;

        } catch (\Exception $e) {
            Log::error('Failed to get transaction confirmations', [
                'tx_hash' => $txHash,
                'error' => $e->getMessage()
            ]);
            return null;
        }
    }
}
