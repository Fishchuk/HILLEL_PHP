<?php
namespace App\Controllers;

use App\Helpers\SessionHelper;
use App\Validators\Posts\CreatePostValidator;
use App\Models\Post;
use Core\Controller;
use Core\View;
use App\Helpers\FileHelper;


class PostsController extends Controller
{
    public function index()
    {
        View::render('posts/index.php');
    }

    public function create()
    {
        $this->before();
        View::render('posts/create.php');

    }

    public function store()
    {
        $this->before();
        if($_FILES['image']['error'] !==0 ) {
            $_SESSION['data'] =[
                'data' => $_POST,
                'title_error' => 'The post should contain an image'
            ];
            siteRedirect('posts/create');
        }
        $fields = filter_input_array(INPUT_POST, $_POST, 1);


        $validator = new CreatePostValidator();
        $fileHelper = new FileHelper();

        if(!$validator->validate($fields)){
           $_SESSION = $validator->getErrors();
           siteRedirect('posts/create');
        }
        $imagePath = $fileHelper->upload($_FILES['image']);
        $fields['image'] = $imagePath;
        $fields['user_id'] = SessionHelper::getUserId();

        $post = new Post();
        $id = $post->insert($fields);
        siteRedirect("posts/" . $id);

    }

    public function show(int $id)
    {
        $postModel = new Post();
        $post = $postModel->getPost($id);

        View::render('posts/show.php', ['post' => $post]);
    }
    protected function before()
    {
        parent::before();
        if (!SessionHelper::isUserLoggedIn()){
            $_SESSION['notification'] = [
                'type' => 'info',
                'message'=>'You should be authorized for this action!'
            ];
            siteRedirect();
        }
    }
}