<?php
namespace App\Models;

use PDO;
class Post extends \Core\Model
{
    protected $tableName ='posts';

    public function __construct()
    {
        $this->detDB();
    }

    public function insert(array $postData)
    {
        $sql = "INSERT INTO {$this->tableName} (user_id, title, content, image) VALUES (:user_id, :title, :content, :image)";
        $sth = $this->db->prepare($sql);
        $sth->execute($postData);
        return $this->db->lastInsertId();
    }

    public function getPost(int $id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id=:id";
        $sth = $this->db->prepare($sql);
        $sth->execute([':id' => $id]);
        $post = $sth->fetch(PDO::FETCH_ASSOC);
        return !empty($post) ? $post : false;
    }
}