<?php

require_once 'config.php';
require_once 'helpers.php';

function deleteUser(PDO $pdo)
{
    $userData = $_POST;
    $query = "DELETE FROM users WHERE id IN(" . implode(',',  $userData['user_id']) . ") ";
    $query = $pdo->prepare($query);
    // $query->bindParam(1, $userData['user_id']);
    $query->execute($userData['user_id']);
}

deleteUser($pdo);
?>
<a href="index.php">Go back</a>