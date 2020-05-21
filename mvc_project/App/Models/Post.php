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

    public function update(int $postId, array $postData)
    {
        $postData['id'] = $postId;
        $sql = "UPDATE {$this->tableName} SET title = :title, content = :content, image = :image WHERE id = :id";
        $sth = $this->db->prepare($sql);
        return $sth->execute($postData);
    }

    public function getPostsByAuthorId(int $userId): array
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE user_id = :user_id";
        $sth = $this->db->prepare($sql);
        $sth->bindValue('user_id', $userId, PDO::PARAM_INT);
        $sth->execute();
        $posts = $sth->fetchAll(PDO::FETCH_ASSOC);

        return !empty($posts) ? $posts : [];
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
        $post = $sth->fetchAll(PDO::FETCH_ASSOC);
        return !empty($post) ? $post : false;
    }
    public function removePostById(int $id)
    {
        $sql = "DELETE FROM {$this->tableName} WHERE id= :id";
        $sth = $this->db->prepare($sql);

        return $sth->execute([':id' => $id]);
    }
}