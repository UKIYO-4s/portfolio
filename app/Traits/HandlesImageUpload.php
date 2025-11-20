<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

trait HandlesImageUpload
{
    /**
     * Upload and optimize an image
     *
     * @param UploadedFile $file
     * @param string $directory
     * @param int|null $maxWidth
     * @param int|null $maxHeight
     * @param int $quality
     * @return string
     */
    protected function uploadImage(
        UploadedFile $file,
        string $directory,
        ?int $maxWidth = 1920,
        ?int $maxHeight = 1920,
        int $quality = 85
    ): string {
        // Generate unique filename
        $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $directory . '/' . $filename;

        // Process the image
        $image = Image::read($file);

        // Resize if necessary (maintain aspect ratio)
        if ($maxWidth || $maxHeight) {
            $image->scale(width: $maxWidth, height: $maxHeight);
        }

        // Encode with quality setting
        $encoded = $image->encodeByMediaType(quality: $quality);

        // Store the optimized image
        Storage::disk('public')->put($path, $encoded);

        return $path;
    }

    /**
     * Upload thumbnail with specific dimensions
     *
     * @param UploadedFile $file
     * @param string $directory
     * @param int $width
     * @param int $height
     * @return string
     */
    protected function uploadThumbnail(
        UploadedFile $file,
        string $directory,
        int $width = 800,
        int $height = 600
    ): string {
        // Generate unique filename
        $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $directory . '/' . $filename;

        // Process the image
        $image = Image::read($file);

        // Cover (crop to exact dimensions)
        $image->cover($width, $height);

        // Encode with quality
        $encoded = $image->encodeByMediaType(quality: 85);

        // Store the optimized image
        Storage::disk('public')->put($path, $encoded);

        return $path;
    }
}
