<?php
namespace App\Controllers;

use App\Helpers\SessionHelper;
use App\Models\User;
use App\Validators\Posts\CreatePostValidator;
use App\Models\Post;
use Core\Controller;
use Core\View;
use App\Helpers\FileHelper;


class PostsController extends Controller
{
    protected $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function index()
    {
        $this->before();
        View::render('posts/index.php',
        [
            'posts' => $this->post->getPostsByAuthorId(SessionHelper::getUserId())
        ]
        );
    }

    public function create()
    {
        $this->before();
        View::render('posts/create.php');

    }

    public function edit(int $id)
    {
        $this->before();
        $post = $this->post->getPostById($id);

        if($post && ((int)$post['user_id'] === SessionHelper::getUserId())){
            View::render('posts/edit.php', compact('post'));
            exit;
        }
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => '404 Post not found'
        ];
        siteRedirect();
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
           $_SESSION['posts_create'] = $validator->getErrors();
           siteRedirect('posts/create');
        }
        $imagePath = $fileHelper->upload($_FILES['image']);
        $fields['image'] = $imagePath;
        $fields['user_id'] = SessionHelper::getUserId();


        $id = $this->post->insert($fields);
        siteRedirect("posts/" . $id);

    }
    public function update(int $id)
    {
        $this->before();
        $post = $this->post->getPostById($id);

        if((int)$post['user_id'] === SessionHelper::getUserId()){
            $fields = filter_input_array(INPUT_POST, $_POST, 1);
            $validator = new CreatePostValidator();
            unset($fields['user_id']);

            if(!$validator->validate($fields)){
                $_SESSION['posts_edit'] = $validator->getErrors();
                siteRedirect("posts/{$id}/edit");
            }
            if($_FILES['image']['error'] ===0){
                $fileHelper = new FileHelper();
                $fileHelper->remove($post['image']);
                $imagePath = $fileHelper->upload($_FILES['image']);
                $fields['image'] = $imagePath;
            }else{
                $fields['image'] = $post['image'];
            }
            $this->post->update($id, $fields);

            $_SESSION['notification'] = [
                'type' => 'success',
                'message' => 'The post was successfully updated'
            ];
            siteRedirect('posts/');
        }
        $_SESSION['notification'] = [
            'type'=>'danger',
            'message' => '403 - The post user id is not equal to your id'
        ];
        siteRedirect('posts/');

    }
    public function delete(int $id)
    {
        $this->before();
        $post = $this->post->getPostById($id);

        if ((int)$post['user_id'] === SessionHelper::getUserId()){
            $result = $this->post->removePostById($id);
            if($result){
                $_SESSION['notification'] = [
                    'type' => 'success',
                    'message' => 'The post #' .$id . ' was successfully removed!'
                ];
            }else{
                $_SESSION['notification'] = [
                    'type' => 'danger',
                    'message' => 'Oops... something wrong!'
                ];
            }
        }else{
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message'=> '403 - The post user id is not equal to your id'
            ];
        }
        siteRedirect('posts');
    }

    public function show(int $id)
    {
        $post = $this->post->getPostById($id);

        $userModel = new User();
        $user = $userModel->getUserById($post['user_id']);

        View::render('posts/show.php', ['post' => $post, 'user' => $user]);
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