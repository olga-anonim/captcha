<?php

namespace Kavalar\Captcha;

class FigureWraper
{
    private $background;
    public $size;

    public function __construct($bg)
    {
        /**
         * @var Background
         */
        $this->background = $bg;
    }

    public function getСoordinatesByAddress($row, $column, $size): array
    {
        return [
            'x' => ($column - 1) * $size,
            'y' => ($row - 1) * $size,
        ];
    }

    public function createGrid($size)
    {
        $this->size = $size;
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 5; $j++) {
                $k_x = $i * $size;
                $k_y = $j * $size;
                imageline($this->background->bg, $k_x, 0, $k_x, 400, 0);
                imageline($this->background->bg, 0, $k_y, 400, $k_y, 0);
//                imagepng($this->background->bg, "img.png");
            }
        }
    }

    private function getRndColor(): int
    {
        return rand(120, 255);
    }

    public function createCircle(int $radius, array $address)
    {
        $coord = $this->getСoordinatesByAddress($address['row'], $address['column'], $this->size);
        var_dump($coord['x'] + $this->size / 2);
        imageSetThickness($this->background->bg, 1);
        imageellipse($this->background->bg, $coord['x'] + $this->size / 2, $coord['y'] + $this->size / 2, $radius, $radius, 0);
        imagefill($this->background->bg, $coord['x'] + $this->size / 2, $coord['y'] + $this->size / 2, $this->getRndColor());
    }

    public function createSquare(int $size, array $address)
    {
        $coord = $this->getСoordinatesByAddress($address['row'], $address['column'], $this->size);
        $x1 = ($coord['x'] + $this->size / 2) - ($size / 2 );
        $y1 = ($coord['y'] + $this->size / 2) - ($size / 2);
        $x2 = ($coord['x'] + $this->size / 2) + ($size / 2 );
        $y2 = ($coord['y'] + $this->size / 2) + ($size / 2);
        imageRectangle($this->background->bg, $x1, $y1, $x2, $y2, 0);
        imagefilledrectangle($this->background->bg, $x1, $y1, $x2, $y2, $this->getRndColor());
    }

    public function render()
    {
        imagepng($this->background->bg, "img.png");
    }

//    public function rand($width, $height, $distance, $distance_setka)
//    {
//        $bg = $this->createBackground($width, $height);
//        $color = rand(120, 255);
//        $color_figure = imagecolorallocate($bg, $color, $color, $color / 2);
//        $zazor = 30; //$distance_setka - $distance;
//
//        for ($i = 0; $i < 5; $i++) {
//            for ($j = 0; $j < 5; $j++) {
//                $k_x = $i * $distance_setka;
//                $k_y = $j * $distance_setka;
//                imageline($bg, $k_x, 0, $k_x, 400, 0);
//                imageline($bg, 0, $k_y, 400, $k_y, 0);
//                imagepng($bg, "img.png");
//
//            }
//        }
//
//        for ($i = 1; $i < 4; $i++) {
//            for ($j = 1; $j < 4; $j++) {
//                $ch = rand(1, 3);
//
//                if ($ch == 1) {
//                    $koord_x = $i * $distance + $zazor; //$i * $distance/3+2*$zazor;
//                    $koord_y = $j * $distance + $zazor;     //$j * $distance/3+2*$zazor;
//                    imageSetThickness($bg, 1);
//                    imageellipse($bg, $koord_x, $koord_y, $distance, $distance, 0);
//                    imagefill($bg, $koord_x, $koord_y, $color_figure);
//
//                    $vstavka = imagecolorallocatealpha($bg, 255, 255, 255, 127);
//                    imageellipse($bg, $i * $distance, $j * $distance, $distance + $zazor, $distance + $zazor, $vstavka);
//
//                } else if ($ch == 2) {
//                    $koord_x = $i + $distance + $zazor;  //$i * $distance - $distance / 2;
//                    $koord_y = $j + $distance - $distance / 2 + $zazor;
//
//                    imageSetThickness($bg, 2);
//                    imageRectangle($bg, $koord_x, $koord_y, $koord_x + $distance, $koord_y + $distance, 0);
//                    imagefilledrectangle($bg, $koord_x, $koord_y, $koord_x + $distance, $koord_y + $distance, $color);
//                } else if ($ch == 3) {
//                    $koord_x = $i * $distance - $distance / 3;
//                    $koord_y = $j * $distance;
//                    $points = [$koord_x, $koord_y,
//                        $koord_x + $distance / 3, $koord_y - $distance / 3,
//                        $koord_x + $distance / 3, $koord_y + $distance / 3
//                    ];
//                    imageSetThickness($bg, 2);
//                    imagepolygon($bg, $points, 3, 0);
//                    imagefilledpolygon($bg, $points, 3, $color_figure);
//                }
//
//            }
//        }
//        $res = imagepng($bg, "img.png");
//        var_dump($res);
//        die();
//    }
}