<?php

namespace Kavalar\Captcha;

class Square implements FigureInterface
{
    /**
     * @var FigureWraper
     */
    public $wrapper;

    public function __construct($bg, $wrapper)
    {
        $this->background = $bg;
        $this->wrapper = $wrapper;
    }

    public function createFigure(int $radius, array $address,$distance_flat,$a)
    {
        $color_figure = imagecolorallocatealpha($this->background->bg, 5, 255, 2,$a);
        $coord = $this->wrapper->getСoordinatesByAddress($address['row'], $address['column'], $distance_flat);
        $x1 = ($coord['x'] + $distance_flat / 2) - ($radius / 2);
        $y1 = ($coord['y'] + $distance_flat / 2) - ($radius / 2);
        $x2 = ($coord['x'] + $distance_flat / 2) + ($radius / 2);
        $y2 = ($coord['y'] + $distance_flat / 2) + ($radius / 2);                            //$y2 = ($coord['y'] + $this->wrapper->size / 2) + ($size / 2);
       // imageRectangle($this->background->bg, $x1, $y1, $x2, $y2, 0);
        imagefilledrectangle($this->background->bg, $x1, $y1, $x2, $y2, $color_figure);
    }

}