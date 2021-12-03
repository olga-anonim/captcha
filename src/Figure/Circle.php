<?php

namespace Kavalar\Captcha\Figure;

use  Kavalar\Captcha\FigureInterface;
use Kavalar\Captcha\FigureWraper;

class Circle implements FigureInterface
{
    /**
     * @var FigureWraper
     *
     */

    public $wrapper;

    public function __construct($bg, $wrapper)
    {
        $this->background = $bg;
        $this->wrapper = $wrapper;

    }

    public function createFigure(int $radius, array $address, $distance_flat, $a)
    {
        $color_figure = imagecolorallocatealpha($this->background->bg, 255, 155, 0, $a);
        $coord = $this->wrapper->getСoordinatesByAddress($address['row'], $address['column'], $distance_flat);
        imageSetThickness($this->background->bg, 1);
        imagearc($this->background->bg, $coord['x'] + $distance_flat / 2, $coord['y'] + $distance_flat / 2, $radius, $radius, 0, 360, $color_figure);
        imageellipse($this->background->bg, $coord['x'] + $distance_flat / 2, $coord['y'] + $distance_flat / 2, $radius, $radius, $color_figure);
        imagefilledellipse($this->background->bg, $coord['x'] + $distance_flat / 2, $coord['y'] + $distance_flat / 2, $radius, $radius, $color_figure);
    }

}