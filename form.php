<?php

use Kavalar\Captcha\Background;
use Kavalar\Captcha\Circle;
use Kavalar\Captcha\Config;
use Kavalar\Captcha\Figure;
use Kavalar\Captcha\FigureWraper;
use Kavalar\Captcha\Image;
use Kavalar\Captcha\Line;
use Kavalar\Captcha\Pentagon;
use Kavalar\Captcha\Square;
use Kavalar\Captcha\Storage;
use Kavalar\Captcha\Triangle;

require_once 'vendor/autoload.php';

$config = Config::config();
$height = $config['width'];
$width = $config['height'] ;
$radius= $config['radius'];
$distance_flat= $config['distance_flat'];
$background = new Background();
$background->createBackground($width, $height);
$wrapper = new FigureWraper($background);
$a = $config['a'];
$wrapper->createGrid($distance_flat, 5, 5);

$figure = new Figure($background,$wrapper);
$figure->arrangementOfFigures($radius, $distance_flat,$a);
$hash = $wrapper->render();
$storage = new Storage($wrapper,$figure);
$storage->setQuestion();
$current_properties = [];
$storage->filesWriter();
//$img = new Image($background,$wrapper);
include 'src/Template/view.php';