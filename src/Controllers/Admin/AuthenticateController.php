<?php
namespace Admin\MvcOop\Controllers\Admin;

use Admin\MvcOop\Commons\Controller;
use Admin\MvcOop\Models\User;

class AuthenticateController extends Controller
{
    public function login()
    {
        if (!empty($_POST)) {
            $_SESSION['error'] = [];

            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error']['email'] = 'Emails cannot be blank and must have formatting';
            }

            if (empty($password)) {
                $_SESSION['error']['password'] = 'Password cannot be left blank';
            }

            $user = (new User)->getByEmailAndPassword($_POST['email'], $_POST['password']);

            if (empty($user)) {
                $_SESSION['error']['not-found'] = 'User not known';
            } else {
                $_SESSION['user'] = $user;
                header('Location: /admin/');
                exit();
            }
        }
        return $this->renderViewAdmin(__FUNCTION__);
    }
    public function logout()
    {
        session_destroy();

        header('Location: /');
        exit();


    }
}