<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

$someText = "101 – a (one) hundred and one
350 – three hundred and fifty
529 – five hundred and twenty-nine
2 491 – two thousand, four hundred and ninety-one
7 512 – seven thousand, five hundred and twelve
27 403 – twenty-seven thousand, four hundred and three
1 225 375 – one million two hundred and twenty-five thousand three hundred and seventy-five";

if(preg_match_all('/\d{1,5}/', $someText, $array)){
    echo '<pre>'. print_r($array[0]) . '</pre>>';
}else
{
    echo "There are no numbers up to 5 characters in this line!";
}

