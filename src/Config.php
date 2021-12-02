<?php

namespace Kavalar\Captcha;

class Config
{
    public static function config()
    {
        return [
            'width' => 500,
            'height' => 600,
            'radius' => 70,
            'distance_flat' => 100,
            'a' => 50 // непрозрачность;

        ];

    }

}