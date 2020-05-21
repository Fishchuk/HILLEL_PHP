<?php
namespace App\Controllers;

use App\Helpers\SessionHelper;
use Core\Controller;
use Core\View;

class AccountController extends Controller
{
    public function __construct()
    {
        if(!SessionHelper::isUserLoggedIn()){
            siteRedirect('login');
        }
    }
    public function index()
    {
        View::render('account/index.php');
    }
    public function password()
    {
        View::render('account/reset-password.php');
    }


}