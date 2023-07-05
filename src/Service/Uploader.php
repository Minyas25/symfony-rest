<?php

namespace App\Service;

class Uploader {

    public function upload(string $base64):string {

        $filename = uniqid() . '.jpg';
        
        $image_data = base64_decode($base64, true);
        $img = \imagecreatefromstring($image_data);
        \imagescale($img, 500);
        \imagejpeg($img, $filename);
        \imagedestroy($img);

        return $filename;
    }
}