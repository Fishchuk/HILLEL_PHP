<?php
namespace Core;



abstract class Validator
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
         return empty($this->errors);
     }


    public function getErrors(): array
    {
        return $this->errors;
    }

}