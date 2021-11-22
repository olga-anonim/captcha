<?php

namespace Kavalar\Captcha;

class Figura extends Background
{

    public function crFigura($width, $height, $distance)
    {

    }

    public function create_x_max($width, $distance)
    {
        $x_max = $width - $distance;
        echo $x_max;
        return ($x_max);

    }

    public function create_x_min($distance)
    {
        $x_min = 0 + $distance;
        echo $x_min;
        return ($x_min);
    }

    public function create_y_max($height, $distance)
    {
        $y_max = $height - $distance;
        echo $y_max;
        return ($y_max);
    }

    public function create_y_min($distance)
    {
        $y_min = 0 + $distance;
        echo $y_min;
        return ($y_min);

    }


    /*    public function create_y_koord($height, $distance)
        {
            $y_min = 0 + $distance;
            $y_max = $height - $distance;
            $koord_y = $y_min;

            while ($koord_y < $y_max) {
                $koord_y = $y_min + $distance;
                $k_y [] = + $koord_y;
            }
            return $k_y;
        }

        public function create_x_koord($width, $distance)
        {
            $x_max = $width - $distance;
            $x_min = 0 + $distance;
            $koord_x = $x_min;
            while ($koord_x < $x_max) {
                $koord_x = $x_min + $distance;
                $k_x [] = + $koord_x;
            }
            return $k_x;
        }

        /*
        /*

      */


}