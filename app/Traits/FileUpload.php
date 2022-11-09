<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait FileUpload
{
    public function uploadFile($file, $folder, $filename = null, $size = 500)
    {
        // if (empty($filename)) {
        //     $ext = strtolower($file->getClientOriginalExtension());
        //     $filename = time();
        //     $filename = "{$filename}.{$ext}";
        // }
        // $path = Storage::disk('public')->put("{$folder}/{$filename}", $file);
        // $path = Storage::disk('public')->put($folder, $file);

        // $path = Storage::putFile('public'.$folder, $file);
        // $path = str_replace('public/', '/storage/', $path);
        $path = Storage::putFile('public/upload', $file);
        $parsePath = str_replace('public/upload/', 'upload/', $path);
        $thumbnail = Image::make( Storage::disk('public')->get($parsePath));

        if ($thumbnail->width() < $size || $thumbnail->height() < $size) {
            $thumbnail = $thumbnail->resize($thumbnail->width(), $thumbnail->height())->stream();
        } else {
            if ($thumbnail->width() > $thumbnail->height()) {
                $width = intval(doubleval($thumbnail->width()) / (doubleval($thumbnail->height()) / doubleval($size)));
                $thumbnail = $thumbnail->resize($width, $size)->stream();
            } else {
                $height = intval(doubleval($thumbnail->height()) / (doubleval($thumbnail->width()) / doubleval($size)));
                $thumbnail = $thumbnail->resize($size, $height)->stream();
            }    
        }
        
        $thumbPath = str_replace('upload/', 'upload/thumbnail_', $parsePath);
        Storage::disk('public')->put($thumbPath, $thumbnail);

        return $thumbPath;
    }

    public function uploadCommon($file, $folder, $filename = null)
    {
        if (empty($filename)) {
            $ext = strtolower($file->getClientOriginalExtension());
            $filename = time();
            $filename = "{$filename}.{$ext}";
        }
        $path = Storage::disk('public')->put("{$folder}/{$filename}", $file);
        $path = Storage::disk('public')->put($folder, $file);

        $path = Storage::putFile('public'.$folder, $file);
        $path = str_replace('public/', '/storage/', $path);

        return $path;
    }

    public function getImageUrl($url)
    {
        return Storage::disk('public')->url($url);
    }
}