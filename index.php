<?php

use Kavalar\Captcha\Background;
use Kavalar\Captcha\Bubble;
use Kavalar\Captcha\Circle;
use Kavalar\Captcha\Figura;
use Kavalar\Captcha\RandWraper;
use Kavalar\Captcha\Rectangl;
use Kavalar\Captcha\Triangle;

require_once 'vendor/autoload.php';

//$bubble = new Bubble();
//$bubble->bubbleModeller();
$height = 400;
$width = 400;
$distance = 70;
$distance_setka =100;
//$zazor = 50;
$figura = new Figura();
echo("\n");
$background = new Background();
$background->createBackground($width, $height);
//$background->addFigure($width, $height,$distance);
echo("\n");
$rand=new RandWraper();
$rand->rand($width, $height,$distance,$distance_setka);


