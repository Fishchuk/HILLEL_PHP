<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST']);

define('BASE_PATH', __DIR__);
define('CREATE_PATH', BASE_PATH . '\\create\\');
define('TEMPLATE_PATH', BASE_PATH . '\\templates\\');
define('INC_PATH', BASE_PATH . '\\inc\\');

define('DB_HOST','127.0.0.1');
define('DB_DATABASE', 'db_pdo');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_DNS', "mysql:host=".DB_HOST.";dbname=".DB_DATABASE);
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
define('OPT', $opt);