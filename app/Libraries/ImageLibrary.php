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

	public static function saveImage($imageKey, $directory) {
		try {
			$request = request();
			if ($request->file($imageKey) && $request->file($imageKey)->isValid()) {
				$file = $request->file($imageKey);
				$destinationPath = public_path($directory);
				$fileName = str_random('32') . '.' . $file->getClientOriginalExtension();
				$file->move($destinationPath, $fileName);

				return $fileName;
			}
		} catch (\Exception $exception) {
		}

		return false;
	}

	public static function removeImage($filename, $directory) {
		try {
			if (!empty($filename) && file_exists(public_path($directory . $filename))) {
				unlink(public_path($directory . $filename));

				return true;
			}
		} catch (\Exception $exception) {
		}

		return false;
	}
}