<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/config/constans.php';
require_once  dirname(__DIR__) . '/config/functions.php';

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);


session_start();

$router = new Core\Router();
require_once dirname(__DIR__) . '/routes/web.php';

if(!preg_match('/assets/i' , $_SERVER['REQUEST_URI'])){
    try {
        $router->dispatch($_SERVER['REQUEST_URI']);
    }catch (Exception $exception){
        echo '<pre>'.print_r($exception->getFile(),true) . '</pre>';
        echo '<pre>'.print_r($exception->getMessage(),true) . '</pre>';
        echo '<pre>'.print_r($exception->getCode(),true) . '</pre>';
        echo '<pre>'.print_r($exception->getLine(),true) . '</pre>';
        die();
    }
}