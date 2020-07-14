<?php
namespace App\Controllers;

use Core\Controller;
use Core\View;
use App\Helpers\SessionHelper;
use App\Models\User;
use PHPGangsta_GoogleAuthenticator;


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
               $_SESSION['2auth'] = [
                   'user_id' => $userData['id'],
                   'secret' => !empty($userData['secret_code']) ? $userData['secret_code'] : null
               ];
               siteRedirect('2auth-verification');
            }else{
                $_SESSION['errors']['login']['common'] = 'The password is not valid';
            }
        }else{
            $_SESSION['errors']['login']['common'] = 'The user with email "'.$fields['email'] . '" not exists';
        }
        siteRedirect('login');
    }
    public function showQrCode()
    {
        if (!empty($_SESSION['qr']['qrCodeUrl'])){
            View::render('auth/qr-code.php', ['qrCodeUrl' => $_SESSION['qr']['qrCodeUrl']]);
            exit;
        }
        siteRedirect('login');
        /*$ga = new PHPGangsta_GoogleAuthenticator();
        $secret = $ga->createSecret();

        $qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);
        */
    }
    public function show2Auth()
    {
        if (!empty($_SESSION['2auth'])){
            View::render('/auth/check-2auth.php');
            exit;
        }
        siteRedirect('login');
    }
    public function verifyAuth()
    {
        $fields = filter_input_array(INPUT_POST,$_POST, 1);
        $session = !empty($_SESSION['2auth']) ? $_SESSION['2auth'] :[];
        unset($_SESSION['2auth']);
        if (!is_null($session['secret']) && !empty($session['user_id']) && !empty($fields['code'])){
            $ga = new PHPGangsta_GoogleAuthenticator();
            $checkResult = $ga->verifyCode($session['secret'], $fields['code']);

            if ($checkResult){
                SessionHelper::setUserData('id', $session['user_id']);
                siteRedirect();
            }
        }
          siteRedirect('login');
    }

    public function logout()
    {
        SessionHelper::destroyUserData();
        siteRedirect('login');
    }
}