<?php
namespace App\Format;

use Interfaces\Format;


Class WithDate implements Format
{

    public function format($string)
    {
        return date('Y-m-d H:i:s') . $string;
    }
}