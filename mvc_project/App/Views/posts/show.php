<?php
\Core\View::render('parts/header.php', ['title' => $post['title']]);
?>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img src="<?php echo ASSETS_URI . $post['image']; ?>" alt="<?php echo $post['title'];?>" width ="350"/>
            </div>
            <div class="col-12">
                <h2><?php echo $post['title'] ?></h2>
            </div>
            <?php if($user): ?>
            <div class="col-12">
                <p>Author: <?php echo $user['first_name'] . ' ' . $user['last_name'] ?></p>
            </div>
            <?php endif; ?>
            <hr>
            <div class="col-12"><?php echo $post['content']; ?>
            </div>

        </div>
    </div>
</div>


<?php
\Core\View::render('parts/footer.php');?>
