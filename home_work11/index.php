<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

class User {
    private $id=25;
    private $pass="qwerty";
    private $email;

    public function getUserData () {
        return array($this->id,$this->pass,$this->email);
    }
}

try{
    $user = new User;
    $test = $user->getUserData();
    $regId = "/^\d+$/";
    $regPass = '/^[а-яА-ЯёЁa-zA-Z0-9][а-яА-ЯёЁa-zA-Z0-9_\.]{,7}*$/';
    if (!preg_match ($regId,$test[0]))  throw new Exception('ID not number');
    if (!preg_match ($regId,$test[1]))  throw new Exception('Password greater than 8 characters');
}
catch (Exception $ex) {
    echo $ex->getMessage();
    echo "<br> File : ".$ex->getFile();
    echo "<br> Line : ".$ex->getLine();
}