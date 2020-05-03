<?php
namespace App\Models;
use PDO;


class User extends \Core\Model
{
    protected $tableName = 'users';

    public function __construct()
    {
        $this->detDB();
    }

    public function create(array $fields)
    {
        $sql="INSERT INTO{$this->tableName} (first_name,last_name,email,password,birthday) VALUES(:first_name, :last_name, :email, :password, :birthday)";
        $fields['password'] = password_hash($fields['password'], PASSWORD_DEFAULT);
        $sth =$this->db->prepare($sql);
        $sth->execute($fields);

        return $this->db->lastInsertId();
    }
    public function getUserByEmail(string $email)
    {
        $sql = "SELECT * FROM{$this->tableName} WHERE email= :email ";
        $sth = $this->db->prepare($sql);
        $sth->execute([':email' => $email]);
        $user = $sth->fetch(PDO::FETCH_ASSOC);

        return !empty($user) ? $user : false;
    }
}