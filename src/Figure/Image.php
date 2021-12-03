<?php

namespace Kavalar\Captcha\Figure;

use Kavalar\Captcha\FigureInterface;
use Kavalar\Captcha\FigureWraper;

class Image implements FigureInterface
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

    public function createFigure(int $radius, array $address, $distance_flat,$a)
    {
        $img = $this->chooseImage($radius);
        $back_img = $this->background->bg;
        $coord = $this->wrapper->getСoordinatesByAddress($address['row'], $address['column'], $distance_flat);
        $x1 = ($coord['x'] + $distance_flat / 2) - ($radius / 2);
        $y1 = ($coord['y'] + $distance_flat / 2) - ($radius / 2);
        $this->imagecopymerge_alpha($back_img, $img, $x1, $y1, 0, 0, $radius, $radius, 100);
    }

    function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct)
    {
        $cut = imagecreatetruecolor($src_w, $src_h);
        imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);
        imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);
        imagecopymerge($dst_im, $cut, $dst_x, $dst_y, 0, 0, $src_w, $src_h, $pct);
    }

    public function chooseImage($radius)
    {
        $dir = "pictures/";
        $img_a = array();
        if (is_dir($dir)) {  // Проверяем действительно ли переменная содержит путь к папке
            if ($od = opendir($dir)) {
                while (($file = readdir($od)) !== false) { // Проверяем все файлы что находятся в папке
                    if (strtolower(strstr($file, ".")) === ".jpg" || strtolower(strstr($file, ".")) === ".jpeg")
                        array_push($img_a, $file);
                }
                closedir($od);
            }
        }
        $rd = rand(0, count($img_a) - 1);
        $filename = $dir . $img_a[$rd];
        $image = imagecreatefromjpeg($filename);
        $image = imagescale($image, $radius, $radius);
        $this->image = $image;
        return $image;
    }
}