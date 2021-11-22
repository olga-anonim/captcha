<?php

namespace Kavalar\Captcha;

class Background
{
    public $bg;

    public function createBackground($width, $height)
    {
        $bg = imagecreatetruecolor($width, $height);
        $white = imagecolorallocate($bg, 255, 255, 255);
        $pastel = imagecolorallocate($bg, 150, 205, 205);
        $color_field = rand($pastel, $white);
        imagefill($bg, 0, 0, $color_field);
        $this->bg = $bg;
        return $bg;
    }
}