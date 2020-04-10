<?php

use App\Models\Order ;
use App\Models\Product ;
use App\Models\User ;
use App\Http\Controllers\MainController ;
use App\Http\Helpers\ImageHelper ;
use App\Http\Controllers\Admin\DashboardController ;
use App\Http\Controllers\Admin\OrdersController ;

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

spl_autoload_register(function ($className) {



        if (file_exists(__DIR__ .'/' . str_ireplace('\\', '/', $className) . '.php')) {
            include_once __DIR__ .'/'. str_ireplace('\\', '/', $className) . '.php';
        }
    else{
          echo "Class ". $className .".php is not exist";
        }

});
 $order = new App\Models\Order();
echo "<br>";
$product = new App\Models\Product() ;
echo "<br>";
$user = new App\Models\User ();
echo "<br>";
$mainController = new App\Http\Controllers\MainController() ;
echo "<br>";
$imageHelper = new App\Http\Helpers\ImageHelper ();
echo "<br>";
$dashboardController = new App\Http\Controllers\Admin\DashboardController ();
echo "<br>";
$ordersController = new App\Http\Controllers\Admin\OrdersController ();

