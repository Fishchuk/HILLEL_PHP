<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

require_once 'helpers.php';

$pdo = getPDO();
$sql = "SHOW TABLES FROM " . DB_DATABASE;
$sql = $pdo->prepare($sql);
$sql->execute();
$result = $sql->fetchAll();



if (empty($result)) {


        $tables_path = __DIR__ . '/create/';
        $tables = [
            'users' => 'create_users_table.sql',

        ];
        foreach ($tables as $name => $fileName) {

            $query = file_get_contents($tables_path . $fileName);
            $result = $pdo->exec($query);


        }




}else{
    echo "Таблица уже создана";
}