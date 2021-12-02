<?php

namespace Kavalar\Captcha;

use function Composer\Autoload\includeFile;

class Storage
{
    public $wrapper;
    public $type;
    public $figure;

    public function __construct($wrapper, $figure)
    {
        $this->wrapper = $wrapper;
        $this->figure = $figure;
    }

    public function setQuestion()
    {
        $figures = [
            '1' => 'circle',
            '2' => 'square',
            '3' => 'triangle',
            '4' => 'pentagon',
            '5' => 'line',
            '6' =>'image'
        ];

        $type = array_rand($figures, 1);
        $this->wrapper->type = $figures[$type];
        return $this->wrapper->type;
    }

    public function filesWriter(): string
    {
        $inf = $this->wrapper->hash . ':' . $this->wrapper->type . ':' . $this->figure->counts[$this->wrapper->type] . "\n";
    //    var_dump( $this->figure->counts);
        $f = 'text.txt';
        $out = fopen($f, 'a+');
        fwrite($out, $inf);
        fclose($out);
        return $inf;
    }
}