<?php

namespace App\Format;

use Interfaces\Format;


Class Raw implements Format
{
    public function format($string)
    {
        return $string;
    }

}