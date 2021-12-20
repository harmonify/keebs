<?php

namespace App\Utilities;

use Illuminate\Support\Facades\Storage;

class ResourceUtilities
{
    private static $defaultImage = 'products/placeholder.jpg';

    /**
     * Store the image on the specified path.
     *
     * @param \Illuminate\Http\UploadedFile $image
     * @param string $path
     * @param string $disk
     * @return string
     */
    public static function storeImage($image, $path = '', $disk = 'public'): string
    {
        if (!$image) {
            return self::$defaultImage;
        }

        return $image->store($path, $disk);
    }

    /**
     * Update the image and store the new image on the specified path.
     *
     * @param string $oldImage
     * @param \Illuminate\Http\UploadedFile $image
     * @param string $path
     * @param string $disk
     * @return string
     */
    public static function updateImage($oldImage, $image, $path = '', $disk = 'public'): string
    {
        if (!$image) {
            return $oldImage;
        }

        static::deleteImage($oldImage, $disk);

        return static::storeImage($image, $path, $disk);
    }

    /**
     * Delete the image
     *
     * @param \Illuminate\Http\UploadedFile $image
     * @param string $disk
     * @return bool
     */
    public static function deleteImage($image, $disk = 'public'): bool
    {
        if ($image !== self::$defaultImage) {
            return Storage::disk($disk)->delete($image);
        }

        return false;
    }
}
