<?php
namespace Core;

abstract class Model
{
    protected $tableName = '';
    protected  $db = null;

    protected function detDB()
    {
        if($this->db === null){
            $dsn = 'mysql:host=' . Config::DB_HOST. 'dbname=' . Config::DB_NAME . 'charset=utf8';
            $this->db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);

            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }
}