<?php
\Core\View::render('parts/header.php', ['title' => 'Create Post']);
?>
<div class="wrapper">
    <div class="container ">
        <h2 class="forma_reg">Create An Account</h2>

        <form  method="POST" action="/user/store" >
            <div class="form-row">
                <div class="col-md-6">
                    <label for="first_name">First Name</label>
                    <input type="text"
                           name="first_name"
                           class="form-control"
                           placeholder="First Name"
                           id="first_name"
                           value="<?php echo !empty($data['first_name']) ? $data['first_name'] : ''; ?>"
                           required
                    />
                    <?php if(!empty($first_name_error)):?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $first_name_error;?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <label for="last_name">Last Name</label>
                    <input type="text"
                           name="last_name"
                           class="form-control"
                           placeholder="Last Name"
                           id="last_name"
                           value="<?php echo !empty($data['last_name']) ? $data['last_name'] : '';?>"
                           required
                    />
                    <?php if(!empty($last_name_error)):?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $last_name_error;?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="birthday">Birthday</label>
                    <input type="date"
                           name="birthday"
                           class="form-control"
                           id="birthday"
                           value="<?php echo !empty($data['birthday']) ? $data['birthday'] : ''; ?>"
                           required />
                    <?php if(!empty($birthday_error)):?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $birthday_error;?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           id="inputEmail4"
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
                    <label for="inputPassword4">Password</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           id="inputPassword4"
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

            <button type="submit"  class="btn btn-primary">Create an account</button>
        </form>
    </div>
</div>
<?php
\Core\View::render('parts/footer.php');?>