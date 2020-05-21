<?php
\Core\View::render('parts/header.php', ['title' => 'Create Post']);
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 d-flex flex-md-column align-content-center align-self-center text-center">
                <h1 class="display-4">G2Auth</h1>
                <img src="<?php echo $qrCodeUrl; ?>" width="150" height="150" style="margin: 0 auto">

                <a href="/users/secret" class="btn btn-outline-primary mt-10" style="margin-top: 32px;">Finished registration</a>
            </div>
        </div>
    </div>
<?php
\Core\View::render('parts/footer.php');