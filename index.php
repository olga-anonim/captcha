<?php

use Kavalar\Captcha\Background;
use Kavalar\Captcha\Bubble;
use Kavalar\Captcha\Figura;
use Kavalar\Captcha\FigureWraper;

require_once 'vendor/autoload.php';

//$bubble = new Bubble();
//$bubble->bubbleModeller();
$height = 400;
$width = 400;
$distance = 70;
$distance_setka =100;
//$zazor = 50;
echo("\n");
$background = new Background();
$background->createBackground($width, $height);
//$background->addFigure($width, $height,$distance);
echo("\n");
$wrapper = new FigureWraper($background);
$wrapper->createGrid($distance_setka);
$wrapper->createCircle($distance, ['row' => 2, 'column' => 3]);
$wrapper->createSquare($distance, ['row' => 3, 'column' => 2]);
$wrapper->render();
echo("\n");


