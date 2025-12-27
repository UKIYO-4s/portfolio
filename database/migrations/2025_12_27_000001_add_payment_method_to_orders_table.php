<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment_method')->default('stripe')->after('payment_intent_id');
            $table->string('tx_hash')->nullable()->after('payment_method');
            $table->string('sender_address')->nullable()->after('tx_hash');
            $table->timestamp('payment_confirmed_at')->nullable()->after('sender_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['payment_method', 'tx_hash', 'sender_address', 'payment_confirmed_at']);
        });
    }
};
