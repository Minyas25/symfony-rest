<?php

namespace App\Service;

class Uploader {

    public function upload(string $base64):string {

        $filename = uniqid() . '.jpg';
        $exploded = explode(',', $base64, 2);
        $encoded = $exploded[1];
        $decoded = base64_decode($encoded);
        $img = \imagecreatefromstring($decoded);

        if(!is_dir('uploads')) {
            mkdir('uploads');
        }
        $img = \imagescale($img, 500);
        \imagejpeg($img, 'uploads/'.$filename);


        \imagedestroy($img);

        return $filename;
    }
}