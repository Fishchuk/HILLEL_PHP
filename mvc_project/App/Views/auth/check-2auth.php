<?php
\Core\View::render('parts/header.php', ['title' => 'Create Post']);
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 d-flex flex-md-column align-content-center align-self-center">
                <h1 class="display-4">2Auth Code</h1>
                <form method="POST" action="/auth">
                    <div class="form-group">
                        <input type="text"
                               class="form-control"
                               name="code"
                               id="email"
                               placeholder="Please put your 2auth code"
                               required
                        />
                    </div>
                    <button type="submit" class="btn btn-primary">Check</button>
                </form>
            </div>
        </div>
    </div>
<?php
\Core\View::render('parts/footer.php');