<?php
namespace Core;

abstract class Controller
{
    protected $validation = true;
    protected $data = [];

    public function __call($name, $args)
    {


       if(method_exists($this, $name)){
           if($this->before() !== false){
               call_user_func_array([$this,$name], $args);
               $this->after();
           }
       }else{
           throw new \Exception("Method $name not found in controller " . get_class($this));
       }
    }
    protected function before()
    {

    }
    protected function after()
    {

    }
}