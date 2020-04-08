<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

require_once 'config.php';
require_once  'helpers.php';
$request = $_SERVER['REQUEST_URI'];

require_once TEMPLATE_PATH . 'header.php';
require_once TEMPLATE_PATH . 'body.php';
try {


    switch ($request) {
        case'/create':
            {
                require_once BASE_PATH .'/create_tables.php';
            }
            break;
        case'/insert':
            {
                 require_once BASE_PATH . '/insert.php';
            }
            break;
        case 'select':
        {
            $query =file_get_contents('CREATE_PATH' . 'select.sql');
            $query = $pdo->prepare($query);
            $query->execute();

            $result = $query->fetchAll();

        }
        break;


        default:
        {
            die('Invalid param');
        }
    }
    require_once TEMPLATE_PATH . 'footer.php';
}catch (PDOException $exception){
      echo '<pre>' . print_r($exception->getCode() . ' - ' . $exception->getMessage(), true) . '</pre>';
      echo '<pre>' . print_r($exception->getFile() . ' - ' . $exception->getLine(), true) . '</pre>';
};
