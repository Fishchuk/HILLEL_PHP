<?php
require_once 'config.php';

function getPDO() : PDO
{
return new PDO(DB_DNS, DB_USER, DB_PASS,OPT);
}
$pdo = getPDO();
function getAllUserById(PDO $pdo)
{
    $query = "SELECT id FROM users ORDER BY id ASC ";
    $query = $pdo->query($query);
    $query = $query->fetchAll(PDO::FETCH_COLUMN);

    return $query;
}