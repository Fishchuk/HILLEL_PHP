<?php
namespace App\Controllers;

use App\Validators\UserValidator;
use Core\Controller;
use Core\View;
use App\Models\User;
use App\Helpers\SessionHelper;
use PHPGangsta_GoogleAuthenticator;

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
                $ga =new PHPGangsta_GoogleAuthenticator();
                $secret = $ga->createSecret();
                $qrCodeUrl = $ga->getQRCodeGoogleUrl('mvc.local', $secret);
                $_SESSION['qr']['secret'] = $secret;
                $_SESSION['qr']['qrCodeUrl'] = $qrCodeUrl;
                $_SESSION['qr']['user_id'] = $newUser;

                siteRedirect('2auth-code');
            }else{
                die("500 - Ooops, smth went wrong.");
            }
        }
        $this->data['data'] = $fields;
        $this->data += $userValidate->getErrors();

        View::render('auth/register.php', $this->data);
    }

    public function storeSecret()
    {
        if (!empty($_SESSION['qr']['secret']) && !empty($_SESSION['qr']['newUser'])){
            $userModel = new User();
            $userModel->storeUserSecret(
                (int)$_SESSION['qr']['newUser'],
                (string)$_SESSION['qr']['secret']
            );
            unset($_SESSION['qr']);
        }
        siteRedirect('login');
    }

    public function update()
    {
        $user = new User();
        $user->getUserById($id);

        if((int)$user['user_id'] === SessionHelper::getUserId()){
            $fields = filter_input_array(INPUT_POST, $_POST, 1);
            $validator = new UserValidator();
            unset($fields['user_id']);

            if(!$validator->validate($fields)){
                $_SESSION['posts_edit'] = $validator->getErrors();
                siteRedirect("account/");
            }

            $this->user->update($id, $fields);

            $_SESSION['notification'] = [
                'type' => 'success',
                'message' => 'The user was successfully updated'
            ];
            siteRedirect();
        }
        $_SESSION['notification'] = [
            'type'=>'danger',
            'message' => 'You cannot change user data'
        ];
        siteRedirect('account/');
    }
    public function changePassword()
    {
        $user = new User();
    }
}