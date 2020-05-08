<?php
function siteRedirect($path = '')
{
    header("Location:" . SITE_URL . "/". $path);
    exit;
}

function show_alert()
{
    if (!empty($_SESSION['notification']) && is_array($_SESSION['notification'])){
       ?>
        <div class="alert alert-<?php echo $_SESSION['notification']['type']?>" style="text-align: center">
            <?php echo $_SESSION['notification']['message'];?>
        </div>
         <?php
        unset($_SESSION['notification']);
    }
}