<?php
namespace App\Deliver;

use Interfaces\Deliver;


class BySms implements Deliver
{

    public function Output($formattedString)
    {
        echo "Вывод формата ({$formattedString}) в SMS";
    }
}