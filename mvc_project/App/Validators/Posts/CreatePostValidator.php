<?php
namespace App\Validators\Posts;

use Core\Validator;

class CreatePostValidator extends Validator
{
    protected $errors=[
        'title_error' => 'The title should contain more than 5 letters',
        'content_error'  => 'The content should not be empty',

    ];
    protected $rules=[
        'title' => '/[A-Za-zA-Яа-я]{5,}/',
        'content' => '/[A-Za-zA-Яа-я]{1,}/',

    ];


}