<?php
namespace App\Controllers;

use \Core\View;
use Core\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $postModel = new Post();
        $posts['posts'] = $postModel->all();
        View::render('home/index.php', ['posts' => $posts]);
    }
}