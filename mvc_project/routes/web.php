<?php
$router->add('',['controller' => 'HomeController', 'action' => 'index']);
$router->add('Home', ['controller' => 'HomeController', 'action' => 'index']);

$router->add('login', ['controller' => 'AuthController', 'action' => 'login']);
$router->add('registration', ['controller' => 'AuthController', 'action' => 'register']);
$router->add('verify', ['controller' => 'AuthController', 'action' => 'verify']);
$router->add('logout', ['controller' => 'AuthController', 'action' => 'logout']);

$router->add('2auth-code', ['controller' => 'AuthController', 'action' => 'showQrCode']);
$router->add('2auth-verification', ['controller' => 'AuthController', 'action' => 'show2Auth']);
$router->add('auth', ['controller' => 'AuthController', 'action' => 'verifyAuth']);

$router->add('user/store', ['controller' => 'UserController', 'action' => 'store']);
$router->add('user/update', ['controller' => 'UserController', 'action' => 'update']);
$router->add('user/update-password', ['controller' => 'UserController', 'action' => 'changePassword']);
$router->add('users/secret', ['controller' => 'UserController', 'action' => 'storeSecret']);

$router->add('account', ['controller' => 'AccountController', 'action' => 'index']);
$router->add('account/password', ['controller' => 'AccountController', 'action' => 'password']);

$router->add('posts', ['controller' => 'PostsController', 'action' => 'index']);
$router->add('posts/create', ['controller' => 'PostsController', 'action' => 'create']);
$router->add('posts/store', ['controller' => 'PostsController', 'action' => 'store']);

$router->add('posts/{id:\d+}', ['controller' => 'PostsController', 'action' => 'show']);
$router->add('posts/{id:\d+}/edit', ['controller' => 'PostsController', 'action' => 'edit']);
$router->add('posts/{id:\d+}/update', ['controller' => 'PostsController', 'action' => 'update']);
$router->add('posts/{id:\d+}/delete', ['controller' => 'PostsController', 'action' => 'delete']);