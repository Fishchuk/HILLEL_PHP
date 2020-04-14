<?php
namespace App\Deliver;

use Interfaces\Deliver;


class ByEmail implements Deliver
{

    public function Output($formattedString)
    {
        echo "Вывод формата ({$formattedString}) по email";
    }
}