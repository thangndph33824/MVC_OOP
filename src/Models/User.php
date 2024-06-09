<?php
namespace Admin\MvcOop\Models;

use Admin\MvcOop\Commons\Model;

class User extends Model
{
    public function getAll()
    {
        try {
            $sql = "SELECT * FROM users ORDER BY id DESC";
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
            $sql = "SELECT * FROM users WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;

        }
    }
    public function insert($name, $email, $password)
    {
        try {
            $sql = "
                INSERT INTO users(name, email, password) 
                VALUES (:name, :email, :password)
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function update($id, $name, $email, $password)
    {
        try {
            $sql = "
                    UPDATE users 
                    SET name = :name,
                        email = :email,
                        password = :password
                    WHERE id = :id
                ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function deleteByID($id)
    {
        try {
            $sql = "DELETE FROM users WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
            echo 'xóa rồi khỏi tìm';
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function getByEmailAndPassword($email, $password)
    {
        try {
            $sql = "SELECT * FROM users WHERE email = :email AND password = :password";

            $stmt = $this->conn->prepare($sql);

            // Đảm bảo số lượng bindParam và tên tham số đều đúng
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            echo 'error: ' . $e->getMessage();
            die;
        }
    }

}