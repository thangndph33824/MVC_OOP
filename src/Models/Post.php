<?php
namespace Admin\MvcOop\Models;

use Admin\MvcOop\Commons\Model;

class Post extends Model
{
    public function getAll_post()
    {
        try {
            $sql = "SELECT * FROM posts  ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function getById($id)
    {
        try {
            $sql = "SELECT * FROM posts WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;

        }
    }
    public function insert($category_id, $title, $content, $excerpt = null, $image = null)
    {
        try {
            $sql = "
                INSERT INTO posts(category_id, title, excerpt, content, image) 
                VALUES (:category_id, :title, :excerpt, :content, :image) 
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':category_id', $category_id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':excerpt', $excerpt);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function update($id, $category_id, $title, $content, $excerpt = null, $image = null)
    {
        try {
            $sql = "
                UPDATE posts 
                SET category_id     = :category_id, 
                    title           = :title, 
                    excerpt         = :excerpt, 
                    content         = :content, 
                    image           = :image
                WHERE id = :id
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':category_id', $category_id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':excerpt', $excerpt);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function deleteByID($id)
    {
        try {
            $sql = "DELETE FROM posts WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
            echo 'xóa rồi khỏi tìm';
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function getLatestLatest()
    {
        try {
            $sql = "
                SELECT 
                    c.name          c_name,
                    p.id            p_id,
                    p.title         p_title,
                    p.excerpt       p_excerpt,
                    p.image         p_image
                FROM posts p
                INNER JOIN categories c
                    ON p.category_id = c.id
                    order by p.id desc
                    limit 1
            ";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function getTopSix()
    {
        try {
            $sql = "
                SELECT 
                    c.name          c_name,
                    p.id            p_id,
                    p.title         p_title,
                    p.excerpt       p_excerpt,
                    p.image         p_image
                FROM posts p
                INNER JOIN categories c
                    ON p.category_id = c.id
                ORDER BY p.id ASC
                LIMIT 6
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }


}