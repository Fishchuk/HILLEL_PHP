<?php
namespace App\Models;
use PDO;
use Core\Model;

class User extends Model
{
    protected $tableName = 'users';

    public function __construct()
    {
        $this->detDB();
    }

    public function create(array $fields)
    {
        $sql="INSERT INTO {$this->tableName} (first_name,last_name,email,password,birthday) VALUES (:first_name, :last_name, :email, :password, :birthday)";
        $fields['password'] = password_hash($fields['password'], PASSWORD_DEFAULT);
        $sth =$this->db->prepare($sql);
        $sth->execute($fields);

        return $this->db->lastInsertId();
    }
    public function getUserByEmail(string $email)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE email= :email ";
        $sth = $this->db->prepare($sql);
        $sth->execute([':email' => $email]);
        $user = $sth->fetch(PDO::FETCH_ASSOC);

        return !empty($user) ? $user : false;
    }
    public function getUserById(int $id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id= :id ";
        $sth = $this->db->prepare($sql);
        $sth->execute([':id' => $id]);
        $user = $sth->fetch(PDO::FETCH_ASSOC);

        return !empty($user) ? $user : false;
    }
    public function updateUserPassword(array $fields, int $userId)
    {


        $sql = "UPDATE {$this->tableName} SET password =  :password WHERE id = :id";
        $fields['password'] = password_hash($fields['password'], PASSWORD_DEFAULT);
        $sth = $this->db->prepare($sql);
        $sth->execute($fields);
        $user = $sth->fetch(PDO::FETCH_ASSOC);


    }
    public function update(int $userId, array $userData)
    {
        $userData['id'] = $userId;
        $sql = "UPDATE {$this->tableName} SET first_name = :first_name, last_name = :last_name, email = :email WHERE id = :id";
        $sth = $this->db->prepare($sql);
        return $sth->execute($userData);
    }
    public function storeUserSecret(int $id, string $secret)
    {
        $sql = "UPDATE users SET secret_code = :secret WHERE id = :id";
        $sth = $this->db->prepare($sql);
        $sth->bindValue(':secret', $secret, PDO::PARAM_STR);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

    }
}