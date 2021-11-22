<?php

namespace Kavalar\Captcha;

class Bubble
{
    public function bubbleModeller()
    {
        //header("Content-type: image/png");
        $kol = rand(1, 3);
        $img = imagecreatetruecolor(300, 300);
        $white = imagecolorallocate($img, 255, 255, 255);
        $pastel = imagecolorallocate($img, 150, 205, 205);
        $color_field = rand($pastel, $white);
        imagefill($img, 0, 0, $color_field);

        for ($i = 0; $i < $kol; $i++) {
            $color = rand(120, 255);
            $color_figure = imagecolorallocate($img, $color, $color, $color / 2);
            $pointRadius = mt_rand(25, 70);
            $rand_distance = mt_rand(25, 70);

            $x_max_square = 280 - $rand_distance;
            $x_min_square = 10 + $rand_distance;
            $y_max_square = 280 - $rand_distance;
            $y_min_square = 10 + $rand_distance;

            $x_max = 300 - $pointRadius;
            $x_min = 0 + $pointRadius;
            $y_max = 300 - $pointRadius;
            $y_min = 0 + $pointRadius;

            $x_koord = rand($x_min, $x_max);
            $y_koord = rand($y_min, $y_max);
            $x_koord_square = rand($x_min_square, $x_max_square);
            $y_koord_square = rand($y_min_square, $y_max_square);

            //$r[] = +$pointRadius;

            $points = [$x_koord_square, $y_koord_square,
                $x_koord_square + $rand_distance, $y_koord_square - $rand_distance,
                $x_koord_square + $rand_distance, $y_koord_square + $rand_distance
            ];
            $rast_circle = sqrt((($x_koord + $pointRadius) - $x_koord) ^ 2 + (($y_koord + $pointRadius) - $y_koord) ^ 2);
            $rast_tr_1 = sqrt((($x_koord_square + $rand_distance) - $x_koord_square) ^ 2 + (($y_koord_square - $rand_distance) - $y_koord_square) ^ 2);
            $rast_tr_2 = sqrt((2 * $y_koord_square + 2 * $rand_distance) ^ 2);
            $rast_tr_3 = sqrt((($x_koord_square + $rand_distance) - $x_koord_square) ^ 2 + (($y_koord_square + $rand_distance) - $y_koord_square) ^ 2);
            $rast_tr = 2*($rast_tr_1 + $rast_tr_2 + $rast_tr_3);
            $rast_square = sqrt((($x_koord_square + $rand_distance)-$x_koord_square)^2 + (($y_koord_square + $rand_distance) - $y_koord_square)^ 2);

        }
    /*    for ($i = 0; $i < $kol-1; $i++){
            $R = $pointRadius[$i]+$pointRadius[$i+1];
            $rast_tr = $rast_tr[$i] + $rast_tr[$i+1];
            $rast_sq = $rast_square[$i] + $rast_square[$i+1];
if ($rast_circle>$R   && $rast_square>$rast_sq && $rast_square>$R) { //&& $rast_tr>$R && $rast_tr>$P_tr && $rast_square>$P_tr
    */imageSetThickness($img, 2);
    imagepolygon($img, $points, 3, 0);
    imagefilledpolygon($img, $points, 3, $color_figure);
    imageSetThickness($img, 7);
    imageRectangle($img, $x_koord_square, $x_koord_square, $x_koord_square + $rand_distance, $x_koord_square + $rand_distance, 0);
    imagefilledrectangle($img, $x_koord_square, $x_koord_square, $x_koord_square + $rand_distance, $x_koord_square + $rand_distance, $color);
    imageSetThickness($img, 2);
    imagearc($img, $x_koord, $y_koord, (int)$pointRadius, (int)$pointRadius, 0, 360, 24);
    imageellipse($img, $x_koord, $y_koord, (int)$pointRadius, (int)$pointRadius, 0);
    imagefill($img, $x_koord, $y_koord, $color_figure);
    imagepng($img, "img.png");
   // } //else imageDestroy($img);


            //  echo  '<img src="'.$img.'"/>';
//            var_dump($res);
      //  }


        /*        $maxRadius = max($r);
                echo("\n");
                echo $maxRadius;
               */
        echo("\n");
        echo($img);

        /*     if (!isset($_POST['choice']))
             {
                 if ($_POST ['field'] = $maxRadius) $captcha=true;

             } return ($captcha);
     */
    }
}