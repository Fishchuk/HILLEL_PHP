<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

require_once 'form.php';

if ($_POST['save']){
    $reglogin = '/^[a-zA-Z][a-zA-Z0-9-_\.]{2,15}$/';
    $regpass = '/^[а-яА-ЯёЁa-zA-Z0-9][а-яА-ЯёЁa-zA-Z0-9_\.]{7,}$/';
    $error="ok";
    if(!preg_match ($reglogin,$_POST['login'])){
        echo "не верный логин";
        exit;
    }else {
        if (!preg_match ($regpass,$_POST['password'])){
            echo "не верный пароль";
            exit;
        }
    }
    echo "Данные успешно введены <br>".strtolower ( $_POST['about'] );

}else {
    echo file_get_contents("form.php");
}