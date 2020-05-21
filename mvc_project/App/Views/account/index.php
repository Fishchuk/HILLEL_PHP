<?php
\Core\View::render('parts/header.php', ['title' => 'Create Account']);
/*if(!empty($userData)){
    $data = $userData;
    unset($userData);
}else (!empty($_SESSION['accountData'])){
    $data = $_SESSION['accountData'];
    unset($_SESSION['accountData']);
}
extract($data);
*/
?>
<div class="wrapper">
    <div class="container ">
        <h2 class="forma_reg">User Account</h2>

        <form  method="POST" action="user/update" id="for_form" >
            <div class="form-row">
                <div class="col-md-6">
                    <label for="inputname">Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder=""
                           id="inputname"
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
                    <label for="inputsurname">Surname</label>
                    <input type="text"
                           name="surname"
                           class="form-control"
                           placeholder=""
                           id="inputsurname"
                           value="<?php echo !empty($data['last_name']) ? $data['last_name'] : '';?>"
                           required
                    >
                    <?php if(!empty($last_name_error)):?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $last_name_error;?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6">
                    <label for="inputemail">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder=""
                           id="inputemail"
                           value="<?php echo !empty($data['email']) ? $data['email'] : ''; ?>"
                           required
                    />
                    <?php if(!empty($email_error)):?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $email_error;?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

            <input type="submit" name="account"  class="btn btn-primary">
        </form>
    </div>

<?php
\Core\View::render('parts/footer.php');
?>