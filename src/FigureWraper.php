<?php

namespace Kavalar\Captcha;

use JetBrains\PhpStorm\ArrayShape;

class FigureWraper
{
    /**
     * @var Figure
     *
     */
    private $background;
    public $type;
    public $hash;

    public function __construct($bg)
    {
        $this->background = $bg;
    }

    public function getСoordinatesByAddress($row, $column, $size): array
    {
        return [
            'x' => ($column - 1) * $size,
            'y' => ($row - 1) * $size,
        ];
    }

    /**
     * @param $distance_flat
     * @param int $row
     * @param int $column
     */
    public function createGrid($distance_flat, int $row, int $column)
    {
        for ($i = 0; $i <= $row; $i++) {
            for ($j = 0; $j <= $column; $j++) {
                $k_x = $i * $distance_flat;
                $k_y = $j * $distance_flat;
                imageline($this->background->bg, $k_x, 0, $k_x, $this->background->h, 0);
                imageline($this->background->bg, 0, $k_y, $this->background->w, $k_y, 0);
            }
        }
    }

    /**
     * @return int
     */
    public function randFigure(): int
    {
        $type = rand(1, 6);
        return $type;
    }

    /**
     * @param $size
     * @return int[]
     */
    public function figuresQuantity($distance_flat)
    {
        $width_quantity = (int)($this->background->w / $distance_flat);
        $height_quantity = (int)($this->background->h / $distance_flat);
        return [
            'quantity_to_width' => $width_quantity,
            'quantity_to_height' => $height_quantity];
    }

    public function render()
    {
        $this->hash = md5(time());
        imagejpeg($this->background->bg, 'assets/captcha/' . $this->hash . ".jpg");
        return $this->hash;
    }
}