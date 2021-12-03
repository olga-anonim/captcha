<?php

namespace Kavalar\Captcha\Figure;

use Kavalar\Captcha\FigureInterface;
use Kavalar\Captcha\FigureWraper;

class Line implements FigureInterface
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
        $color_figure = imagecolorallocatealpha($this->background->bg, 255, 25, 12,$a);
        $coord = $this->wrapper->getСoordinatesByAddress($address['row'], $address['column'], $distance_flat);
        $x1 = ($coord['x'] + $distance_flat / 2) - ($radius / 2);
        $y1 = ($coord['y'] + $distance_flat / 2) - ($radius / 2);
        $x2 = ($coord['x'] + $distance_flat / 2) + ($radius / 2);
        $y2 = ($coord['y'] + $distance_flat / 2) + ($radius / 2);
        imageSetThickness($this->background->bg, 5);
        imageline($this->background->bg, $x1, $y1, $x2, $y2, $color_figure);
    }


}