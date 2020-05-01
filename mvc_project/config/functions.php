<?php
function siteRedirect($path = '')
{
    header("Location:" . SITE_URL . "/". $path);
    exit;
}