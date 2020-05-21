<?php
\Core\View::render('parts/header.php', ['title' => 'Create Post']);
?>
<div class="wrapper ">
    <div class="container ">
        <h2 class="forma_reg">Change Password</h2>

        <form  method="POST" action="user/update-password" >

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword3">Old Password</label>
                    <input type="password"
                           name="old_password"
                           class="form-control"
                           id="inputPassword3"
                           value="<?php echo !empty($data['password']) ? $data['password'] : ''; ?>"
                           required />
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">New Password</label>
                    <input type="password" name="password"  class="form-control" id="inputPassword4">
                </div>


            </div>

            <input type="submit" name="changePass"  class="btn btn-primary">
        </form>
    </div>
</div>
<?php
\Core\View::render('parts/footer.php');
?>