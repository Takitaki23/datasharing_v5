<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Imagick;
use ImagickPixel;

class ImageController extends Controller
{
    public function getImages()
    {
        // path to public
        $path = public_path('id_image/');

        // get all images in path
        $imageFiles = File::files($path);
        // dd($imageFiles);
        $imageNames = [];
        foreach ($imageFiles as $imageFile) {
            $imageName = basename($imageFile);
            $imageNames[] = $imageName;
        }
        return response()->json($imageNames);
    }

    // get id generated
    public function getGeneratedId()
    {
        // Path to the "id_final" directory within the "public" folder
        $path = public_path('id_final/');

        // Get all files (images) in the specified path
        $imageFiles = File::files($path);

        // Filter out only the file names with the "_f.png" suffix
        $filteredImages = array_filter($imageFiles, function ($imageFile) {
            return str_ends_with($imageFile, '_f.png');
        });

        // Extract the base names (file names) of the filtered images
        $idNames = array_map('basename', $filteredImages);

        return response()->json($idNames);
    }

    public function getSignatures()
    {
        // path to public
        $path = public_path('id_signatures/');

        // get all images in path
        $imageFiles = File::files($path);
        // dd($imageFiles);
        $imageNames = [];
        foreach ($imageFiles as $imageFile) {
            $imageName = basename($imageFile);
            $imageNames[] = $imageName;
        }
        return response()->json($imageNames);
    }
    public function handleUpload(Request $request)
    {
        $files = $request->file('files');
        foreach ($files as $file) {
            // Get the original file name
            $filename = $file->getClientOriginalName();

            // Move the file to the public folder
            $file->move(public_path('id_template/'), $filename);
        }

        // Return a response indicating success
        return response()->json(['message' => 'Templates uploaded successfully']);
    }

    public function handleUploadSignature(Request $request)
    {
        // dd($request->file('signatureImage'));
        if ($request->hasFile('signatureImage')) {
            $file = $request->file('signatureImage');
            // Get the original file name
            $filename = $file->getClientOriginalName();

            // Create an instance of Intervention Image with the GD driver
            $imageManager = new ImageManager(['driver' => 'gd']);
            $image = $imageManager->make($file->getRealPath());

            // Convert the image to PNG format with transparency
            $image->encode('png');

            $width = $image->getWidth();
            $height = $image->getHeight();

            // Determine the background color from a specific pixel
            $backgroundPixel = $image->pickColor(0, 0, 'array');
            $backgroundColor = [$backgroundPixel[0], $backgroundPixel[1], $backgroundPixel[2]];

            $tolerance = 20;

            for ($x = 0; $x < $width; $x++) {
                for ($y = 0; $y < $height; $y++) {
                    $pixelColor = $image->pickColor($x, $y, 'array');
                    if ($this->colorDistance($pixelColor, $backgroundColor) <= $tolerance) {
                        $image->pixel([0, 0, 0, 255], $x, $y);
                    }
                }
            }

            // Move the file to the public folder
            $image->save(public_path('id_signatures/') . $filename);
            // Return a response indicating success
            return response()->json(['message' => 'Signature uploaded successfully']);
        }
        // Return a response indicating failure
        return response()->json(['message' => 'No signature image provided'], 400);
    }

    /**
     * Calculate the distance between two colors in RGB space.
     *
     * @param array $color1 First color [R, G, B]
     * @param array $color2 Second color [R, G, B]
     * @return float Distance between the colors
     */
    private function colorDistance($color1, $color2)
    {
        $rDiff = $color1[0] - $color2[0];
        $gDiff = $color1[1] - $color2[1];
        $bDiff = $color1[2] - $color2[2];
        return sqrt($rDiff * $rDiff + $gDiff * $gDiff + $bDiff * $bDiff);
    }
}
