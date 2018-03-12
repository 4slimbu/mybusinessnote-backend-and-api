<?php


namespace App\Libraries;


use App\Exceptions\InvalidImageException;
use App\Exceptions\SaveImageException;

class ImageLibrary
{
    public static function isBase64Image($image)
    {
        return preg_match('#^data:image/\w+;base64,#i', $image);
    }

    public static function saveBase64Image($image, $directory, $newImageName)
    {
        if (preg_match('#^data:image/\w+;base64,#i', $image)) {
            // remove the part that we don't need from the provided image and decode it
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image));
            $file_path = $directory . $newImageName;
            $success = file_put_contents($file_path, $data);

            if (!$success) {
                throw new SaveImageException();
            }

            return $newImageName;
        };

        throw new InvalidImageException();
    }
}