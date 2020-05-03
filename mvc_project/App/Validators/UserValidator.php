<?php
namespace App\Validators;

use App\Models\User;

class UserValidator
{
    protected $errors=[
        'first_name_error' => 'The name should contain more than 2 letters',
        'last_name_error'  => 'The surname should contain more than 2 letters',
        'birthday_error'   => 'Birthday date is invalid',
        'email_error'      => 'Email is invalid',
        'password_error'   => 'The password should contain more than 8 letters',
    ];
    protected $rules=[
        'first_name' => '/[A-Za-zA-Яа-я]{2,}/',
        'last_name' => '/[A-Za-zA-Яа-я]{2,}/',
        'birthday'  => '/[\d]{4}-[\d]{2}-[\d]{2}/',
        'email'     => '/^[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i',
        'password'  => '/[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]{8,}/',
    ];
    public function storeValidate(array $fields): bool
    {
        foreach ($fields as $key => $field){
            if(preg_match($this->rules[$key],$field)){
                unset($this->errors["{$key}_error"]);
            }
        }
        return empty($this->errors) ? true: false;
    }
    public function checkEmailOnExists(string $email)
    {
        $user = new User();
        if($user->getUserByEmail($email)){
            $this->errors =[
                'email_error' => 'User with this email already exists'
            ];
            return true;
        }
        return false;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

}
