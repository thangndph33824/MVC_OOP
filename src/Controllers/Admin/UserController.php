<?php
namespace Admin\MvcOop\Controllers\Admin;

use Admin\MvcOop\Commons\Controller;
use Admin\MvcOop\Models\User;

class UserController extends Controller
{
    private User $user;
    private string $folder = 'users.';
    public function __construct()
    {

        $this->user = new User;
    }
    // Danh sách
    public function index()
    {
        $data['users'] = $this->user->getAll();

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
    //thêm mới
    public function create()
    {
        if (!empty($_POST)) {
            $this->user->insert($_POST['name'], $_POST['email'], $_POST['password']);

            header('Location: /admin/users');
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }
    public function update($id)
    {
        $data['user'] = $this->user->getByID($id);

        if (empty($data['user'])) {
            die(404);
        }

        if (!empty($_POST)) {
            $this->user->update(
                $id,
                $_POST['name'],
                $_POST['email'],
                $_POST['password']
            );
            header("Location: /admin/users/");
            exit();
        }

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
    public function show($id)
    {
        $data['user'] = $this->user->getById($id);
        if (empty($data['user'])) {
            die(404);
        }
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );

    }
    public function delete($id)
    {
        $this->user->deleteByID($id);
        header('Location: /admin/users');
        exit();
    }

}