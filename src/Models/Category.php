<?php
namespace Admin\MvcOop\Models;

use Admin\MvcOop\Commons\Model;

class Category extends Model
{
    public function getForMenu()
    {
        try {
            $sql = "SELECT id,name FROM Categories ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function getAll_Categories()
    {
        try {
            $sql = "SELECT * FROM Categories ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function getById_Categories($id)
    {
        try {
            $sql = "SELECT * FROM Categories WHERE id = :id";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();

        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function insert_Categories($name)
    {
        try {
            $sql = "INSERT INTO Categories(name)
            VALUES (:name)
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            echo 'thêm thành công';
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function update_Categories($id, $name)
    {
        try {
            $sql = "UPDATE Categories SET name = :name WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function deleteByID_Categories($id)
    {
        try {
            $sql = "DELETE FROM Categories WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            echo 'Đã xóa khỏi danh sách.';
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }


}