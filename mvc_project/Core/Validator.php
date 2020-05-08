<?php
namespace Core;



 class Validator
{
    protected $errors = [];

    protected $rules = [];

     public function validate (array $request):bool
     {
         foreach ($request as $key => $field) {
             if (preg_match($this->rules[$key], $field)) {
                 unset($this->errors["{$key}_error"]);
             }
         }
     }


    public function getErrors(): array
    {
        return $this->errors;
    }

}