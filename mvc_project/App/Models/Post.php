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

    public function getPostById(int $id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id=:id";
        $sth = $this->db->prepare($sql);
        $sth->execute([':id' => $id]);
        $post = $sth->fetch(PDO::FETCH_ASSOC);
        return !empty($post) ? $post : false;
    }
    public function all(): array
    {
        $sql = "SELECT * FROM {$this->tableName} ORDER BY created_at DESC";
        $sth = $this->db->prepare($sql);
        $sth->execute();
        $post = $sth->fetch(PDO::FETCH_ASSOC);
        return !empty($post) ? $post : false;
    }
}