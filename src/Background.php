<?php

namespace Kavalar\Captcha;

class Background
{
    public $bg;
    public $w;
    public $h;

    public function createBackground($width, $height)
    {
        $this->w = $width;
        $this->h = $height;
        $bg = $this->chosseBgImage($width, $height);
        return $bg;
    }

    public function chosseBgImage($width, $height)
    {
        $dir = "assets/";
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
        $bg = imagecreatefromjpeg($filename);
        $bg = imagescale($bg, $width, $height);
        $this->bg = $bg;
        return $bg;
    }
}
