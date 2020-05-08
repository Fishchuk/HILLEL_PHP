<?php
\Core\View::render('parts/header.php', ['title' => 'Create Post']);
?>

<div class="wrapper ">
    <div class="container ">
        <h2 class="forma_reg">Login</h2>
        <?php if(!empty($_SESSION['errors']['login']['common'])): ?>
        <div class="alert alert-danger" role="alert">
           <?php echo $_SESSION['errors']['login']['common']; ?>
        </div>
         <?php endif; ?>
        <form  method="POST" action="/auth" >

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           id="email"
                           value="<?php echo !empty($data['email']) ? $data['email'] : ''; ?>"
                           required />
                    <?php if(!empty($email_error)):?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $email_error;?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           id="password"
                           value="<?php echo !empty($data['password']) ? $data['password'] : ''; ?>"
                           required
                    />
                    <?php if(!empty($password_error)):?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $password_error;?>
                        </div>
                    <?php endif; ?>
                </div>


            </div>

            <input type="submit" name="login"  class="btn btn-primary">
        </form>
    </div>
</div>
<?php
\Core\View::render('parts/footer.php');
?>