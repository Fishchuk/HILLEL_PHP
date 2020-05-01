<?php
namespace App\Controllers;

use Core\Controller;

class AuthController extends Controller
{
    public function login()
    {
        View::render('auth/login.php');
    }

    public function register()
    {
        View::render('auth/register.php');
    }
    public function verify()
    {
        unset($_SESSION['errors']['login']['common']);
        $fields = filter_input_array(INPUT_POST, $_POST, 1);

        $user = new User();

        if($userData = $user->getUserByEmail($fields['email'])){
            if(password_verify($fields['password'], $userData['password'])){
                SessionHelper::setUserData('id', $userData['id']);
                siteRedirect('home');
            }else{
                $_SESSION['errors']['login']['common'] = 'The password is not valid';
            }
        }else{
            $_SESSION['errors']['login']['common'] = 'The user with email "'.$fields['email'] . '" not exists';
        }
        siteRedirect('login');
    }

    public function logout()
    {
        SessionHelper::destroyUserData();
        siteRedirect('login');
    }
}