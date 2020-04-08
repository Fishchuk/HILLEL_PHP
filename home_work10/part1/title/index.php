<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);


ob_start();
include_once 'empty.html';
$text = ob_get_contents();
ob_clean();


$myReg = '/<title[^>]*?>(.*?)<\/title>/';
preg_match_all($myReg,$text, $match);
echo '<pre>'. print_r($match[1][0]) . '</pre>>';