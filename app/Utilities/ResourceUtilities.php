<?php

namespace App\Utilities;

use Illuminate\Support\Facades\Storage;

class ResourceUtilities
{
    private static $defaultImage = 'images/placeholder.jpg';

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

        return $image->store($path ? "images/{$path}" : "images", $disk);
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

        self::deleteImage($oldImage, $disk);

        return $image->store($path ? "images/{$path}" : "images", $disk);
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
