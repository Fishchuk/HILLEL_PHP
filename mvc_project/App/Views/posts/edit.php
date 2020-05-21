<?php
\Core\View::render('parts/header.php', ['title' => 'Create Post']);
if(!empty(($_SESSION)['posts_edit'])){
    extract($_SESSION['posts_edit']);
    if (!empty($_SESSION['posts_edit']['data'])){
    extract( $_SESSION['posts_edit']);
   }

    unset($_SESSION['posts_edit']);
}
?>
<div class="wrapper ">
    <div class="conteiner">
        <div class="row">
            <div class="col-sm-12 d-flex flex-md-column align-center align-self-center">
                <h2 class="display-4">Create Post Form</h2>
                <form method="POST" action="/posts/<?php echo $post['id']; ?>/update" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="postTitle">Title</label>
                        <input type="text"
                               class="form-control"
                               name="title"
                               id="postTitle"
                               placeholder="Post Title"
                               value="<?php echo !empty($post['title'])? $post['title'] : ''; ?>"
                        />
                        <?php if(!empty($title_error)) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $title_error; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <div>
                            <p>Old Image</p>
                            <img src="<?php echo ASSETS_URI . $post['image']; ?>" width="250" height="250" >
                        </div>
                        <label for="postImage">Image</label>
                        <input type="file" name="image" id="postImage"/>


                    </div>
                    <div class="form-group">
                        <label for="postContent">Content</label>
                        <textarea name="content" id="postContent" class="form-control" cols="30" rows="10"><?php echo !empty($post['content']) ? $post['content'] : ''; ?></textarea>
                        <?php if(!empty($content_error)) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $content_error; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </form>

            </div>
        </div>
    </div>
</div>

<?php
\Core\View::render('parts/footer.php');?>

