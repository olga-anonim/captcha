<?php

namespace Kavalar\Captcha;

class RandWraper extends Background
{

    public function rand($width, $height, $distance, $distance_setka)
    {
        $bg = $this->createBackground($width, $height);
        $color = rand(120, 255);
        $color_figure = imagecolorallocate($bg, $color, $color, $color / 2);
        $zazor = 30; //$distance_setka - $distance;

        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 5; $j++) {
                $k_x = $i * $distance_setka;
                $k_y = $j * $distance_setka;
                imageline($bg, $k_x, 0, $k_x, 400, 0);
                imageline($bg, 0, $k_y, 400, $k_y, 0);
                imagepng($bg, "img.png");

            }
        }

        for ($i =1 ; $i < 4; $i++) {
            for ($j = 1; $j < 4; $j++) {
                $ch = rand(1, 3);

                if ($ch == 1) {
                    $koord_x = $i * $distance+$zazor; //$i * $distance/3+2*$zazor;
                    $koord_y = $j * $distance+$zazor;     //$j * $distance/3+2*$zazor;
                    imageSetThickness($bg, 1);
                    imageellipse($bg, $koord_x, $koord_y, $distance, $distance, 0);
                    imagefill($bg, $koord_x, $koord_y, $color_figure);

                $vstavka = imagecolorallocatealpha($bg,255,255,255,127);
                    imageellipse($bg, $i * $distance, $j * $distance, $distance+$zazor, $distance+$zazor, $vstavka);

                } else if ($ch == 2) {
                    $koord_x = $i + $distance+$zazor ;  //$i * $distance - $distance / 2;
                    $koord_y = $j + $distance - $distance / 2+ $zazor;

                    imageSetThickness($bg, 2);
                    imageRectangle($bg, $koord_x, $koord_y, $koord_x + $distance, $koord_y + $distance, 0);
                    imagefilledrectangle($bg, $koord_x, $koord_y, $koord_x + $distance, $koord_y + $distance, $color);
                } else if ($ch == 3) {
                    $koord_x = $i * $distance - $distance / 3;
                    $koord_y = $j * $distance;
                    $points = [$koord_x, $koord_y,
                        $koord_x + $distance / 3, $koord_y - $distance / 3,
                        $koord_x + $distance / 3, $koord_y + $distance / 3
                    ];
                    imageSetThickness($bg, 2);
                    imagepolygon($bg, $points, 3, 0);
                    imagefilledpolygon($bg, $points, 3, $color_figure);
                }

            }
        }
        $res = imagepng($bg, "img.png");
        var_dump($res);
        die();
    }
}