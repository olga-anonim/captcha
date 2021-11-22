<?php

namespace Kavalar\Captcha;

class Background
{
    public function createBackground($width, $height)
    {
        $bg = imagecreatetruecolor($width, $height);
        $white = imagecolorallocate($bg, 255, 255, 255);
        $pastel = imagecolorallocate($bg, 150, 205, 205);
        $color_field = rand($pastel, $white);
        imagefill($bg, 0, 0, $color_field);
        return $bg;
    }

    public function addFigure($width, $height, $distance)
    {
        $circle = new Circle();
        $rect = new Rectangl();
        $tr = new Triangle();
        $circle->crCircle($width, $height, $distance);
        $rect->crRect($width, $height, $distance);
        $tr->crTriangle($width, $height, $distance);
$kol_circle = rand(1,6);
        $kol_rect = rand(1,6);
        $kol_tr = 16-($kol_circle+$kol_rect);

}
}