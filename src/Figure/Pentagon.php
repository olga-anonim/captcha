<?php

namespace Kavalar\Captcha\Figure;

use Kavalar\Captcha\FigureInterface;
use Kavalar\Captcha\FigureWraper;

class Pentagon implements FigureInterface
{
    /**
     * @var FigureWraper
     */
    public $wrapper;
    public $background;

    public function __construct($bg, $wrapper)
    {
        $this->background = $bg;
        $this->wrapper = $wrapper;
    }

    public function createFigure(int $radius, array $address, $distance_flat,$a)
    {
        $color_figure = imagecolorallocatealpha($this->background->bg, 255, 0, 255,$a);
        $coord = $this->wrapper->getСoordinatesByAddress($address['row'], $address['column'], $distance_flat);
        $x1 = ($coord['x'] + $distance_flat / 2);
        $y1 = ($coord['y'] + $distance_flat / 2) - ($radius / 2);
        $x2 = ($coord['x'] + $distance_flat / 2)- ($radius / 2);
        $y2 = ($coord['y'] + $distance_flat / 2);// - ($radius / 2);
        $x3 = ($coord['x'] + $distance_flat / 2) - ($radius / 2);
        $y3 = ($coord['y'] + $distance_flat / 2) + ($radius / 2);
        $x4 = ($coord['x'] + $distance_flat / 2) + ($radius / 2);
        $y4 = ($coord['y'] + $distance_flat / 2) + ($radius / 2);
        $x5 = ($coord['x'] + $distance_flat / 2) + ($radius / 2);
        $y5 = ($coord['y'] + $distance_flat / 2);// - ($radius / 2);
        $points = [$x1, $y1, $x2, $y2, $x3, $y3,$x4, $y4,$x5, $y5];
      //  imagepolygon($this->background->bg, $points, 5, 0);
        imagefilledpolygon($this->background->bg, $points, 5, $color_figure);
    }
}