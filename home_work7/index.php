<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

class User
{
    private $name;
    private $age;
    private $email;

    private function setName($name)
    {
        $this->name = $name;
    }

    private function setAge($age)
    {
       $this->age = $age;
    }
    public function getAll()
    {
        return $this->name;
        return $this->age;
    }
    public function __call($name, $arguments)
    {
        call_user_func(array($this, $name), $arguments);
    }
}
$user = new User();
$user->getAll();