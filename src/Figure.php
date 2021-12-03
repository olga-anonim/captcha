<?php

namespace Kavalar\Captcha;

use Kavalar\Captcha\Figure\Circle;
use Kavalar\Captcha\Figure\Image;
use Kavalar\Captcha\Figure\Line;
use Kavalar\Captcha\Figure\Pentagon;
use Kavalar\Captcha\Figure\Square;
use Kavalar\Captcha\Figure\Triangle;
use function Composer\Autoload\includeFile;

class Figure
{
    /**
     * @var FigureWraper
     */
    public $wrapper;
    /**
     * @var Circle
     */
    public $circle;
    /**
     * @var Square
     */
    public $Square;
    /**
     * @var Triangle
     */
    private $Triangle;
    /**
     * @var Pentagon
     */
    private $Pentagon;
    /**
     * @var Line
     */
    private $Line;
    /**
     * @var Image
     */
    private $Image;
    public $bg;
    public $w;
    public $h;

    public function __construct($bg, $wrapper)
    {
        $this->background = $bg;
        $this->wrapper = $wrapper;
        $this->circle = new Circle($bg, $wrapper);
        $this->Square = new Square($bg, $wrapper);
        $this->Triangle = new Triangle($bg, $wrapper);
        $this->Pentagon = new Pentagon($bg, $wrapper);
        $this->Line = new Line($bg, $wrapper);
        $this->Image = new Image($bg, $wrapper);
    }

    public function arrangementOfFigures($radius, $distance_flat, $a)
    {
        $kol_circle = 0;
        $kol_square = 0;
        $kol_triangle = 0;
        $kol_pentagon = 0;
        $kol_line = 0;
        $kol_img = 0;
        $fl = 0;

        for ($i = 1; $i <= $this->wrapper->figuresQuantity($distance_flat)['quantity_to_height']; $i++) {
            for ($j = 1; $j <= $this->wrapper->figuresQuantity($distance_flat)['quantity_to_width']; $j++) {
                $figure_type = $this->wrapper->randFigure();
                if ($figure_type == 1) {
                    $this->circle->createFigure($radius, ['row' => $i, 'column' => $j], $distance_flat, $a);
                    $kol_circle = $kol_circle + 1;
                } else if ($figure_type == 2) {
                    $this->Square->createFigure($radius, ['row' => $i, 'column' => $j], $distance_flat, $a);
                    $kol_square = $kol_square + 1;
                } else if ($figure_type == 3) {
                    $this->Triangle->createFigure($radius, ['row' => $i, 'column' => $j], $distance_flat, $a);
                    $kol_triangle = $kol_triangle + 1;
                } else if ($figure_type == 4) {
                    $this->Pentagon->createFigure($radius, ['row' => $i, 'column' => $j], $distance_flat, $a);
                    $kol_pentagon = $kol_pentagon + 1;
                } else if ($figure_type == 5) {
                    $this->Line->createFigure($radius, ['row' => $i, 'column' => $j], $distance_flat, $a);
                    $kol_line = $kol_line + 1;
                } else if ($figure_type == 6) {
                    $this->Image->createFigure($radius, ['row' => $i, 'column' => $j], $distance_flat,$a);
                    $kol_img = $kol_img + 1;
                }
                $fl++;
            }
        }

        $this->counts = ['circle' => $kol_circle,
            'square' => $kol_square,
            'triangle' => $kol_triangle,
            'pentagon' => $kol_pentagon,
            'line' => $kol_line,
            'image' => $kol_img
        ];
    }


}