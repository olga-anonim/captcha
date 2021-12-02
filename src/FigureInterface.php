<?php

namespace Kavalar\Captcha;

interface FigureInterface
{
    public function createFigure(int $radius, array $address,$distance_flat,$a);
}