<?php

require_once 'config.php';
require_once 'helpers.php';

function getUserInfo(PDO $pdo)
{
    $userData = $_GET;
    $query = "SELECT * FROM users WHERE id=? ";
    $query = $pdo->prepare($query);
    $query->bindParam(1, $userData['user_id']);
    $query->execute();
    $query = $query->fetch(PDO::FETCH_ASSOC);

    return $query;
}

echo '<pre>' . print_r(getUserInfo($pdo), true) . '</pre>';
?>
<a href="index.php">Go back</a>