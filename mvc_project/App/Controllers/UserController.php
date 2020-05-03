<?php
namespace App\Controllers;

use App\Validators\UserValidator;
use Core\Controller;
use Core\View;
use App\Models\User;

class UserController extends Controller
{
    public function store()
    {
        $fields = filter_input_array(INPUT_POST, $_POST, 1);
        $userValidate = new UserValidator();

        if($userValidate->storeValidate($fields) && !$userValidate->checkEmailOnExists($fields['email'])){
            $user = new User();
            $newUser = $user->create($fields);

            if($newUser){
                siteRedirect('login');
            }else{
                die("500 - Ooops, smth went wrong.");
            }
        }
        $this->data['data'] = $fields;
        $this->data += $userValidate->getErrors();

        View::render('auth/register.php');
    }
}