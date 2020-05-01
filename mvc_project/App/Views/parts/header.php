<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" href="<?php echo ASSETS_URI; ?>style/style.css" media="all" >
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URI; ?>slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URI; ?>slick/slick-theme.css">

    <title><?php echo !empty($title) ? $title : 'Site-mvc'; ?> </title>
</head>
<body>
<div class="wrapper">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">Site MVC</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <?php if(\App\Helpers\SessionHelper::isUserLoggedIn()): ?>
                            <li class="nav-item active">
                                <a class="nav-link" href="/logout">Logout </a>
                            </li>
                            <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/registration">Registration</a>
                            </li>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#">|</a>
                            </li>
                            <?php if(\App\Helpers\SessionHelper::isUserLoggedIn()): ?>
                            <li class="nav-item">
                                <a class="nav-link " href="/posts">Posts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="/posts/create">Create Post</a>
                            </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>