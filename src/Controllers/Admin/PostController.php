<?php
namespace Admin\MvcOop\Controllers\Admin;

use Admin\MvcOop\Commons\Controller;
use Admin\MvcOop\Models\Post;
use Admin\MvcOop\Models\Category;


class PostController extends Controller
{
    private Post $post;
    const PATH_UPLOAD = '/uploads/posts/';
    private string $folder = 'posts.';

    public function __construct()
    {
        $this->post = new Post;
    }

    // Danh sách
    public function index()
    {
        $data['posts'] = $this->post->getAll_post();

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
    public function create()
    {
        if (!empty($_POST)) {
            $categoryID = $_POST['category_id'];
            $title = $_POST['title'];
            $excerpt = $_POST['excerpt'];
            $content = $_POST['content'];

            $image = $_FILES['image'] ?? null;
            $imagePath = null;
            if ($image) {
                $imagePath = self::PATH_UPLOAD . time() . $image['name'];

                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                    $imagePath = null;
                }
            }

            $this->post->insert(
                $categoryID,
                $title,
                $content,
                $excerpt,
                $imagePath
            );

            header('Location: /admin/posts/');
            exit();
        }

        $data['categories'] = (new Category)->getAll_Categories();

        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }


    public function update($id)
    {
        $data['post'] = $this->post->getByID($id);

        if (empty($data['post'])) {
            die(404);
        }

        if (!empty($_POST)) {
            $categoryID = $_POST['category_id'];
            $title = $_POST['title'];
            $excerpt = $_POST['excerpt'];
            $content = $_POST['content'];

            $image = $_FILES['image'] ?? null;
            $imagePath = $data['post']['image'];
            $move = false;
            if ($image) {
                $imagePath = self::PATH_UPLOAD . time() . $image['name'];

                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                    $imagePath = $data['post']['image'];
                } else {
                    $move = true;
                }
            }

            $this->post->update(
                $id,
                $categoryID,
                $title,
                $content,
                $excerpt,
                $imagePath
            );

            if (
                $move
                && $data['post']['image']
                && file_exists(PATH_ROOT . $data['post']['image'])
            ) {
                unlink(PATH_ROOT . $data['post']['image']);
            }
            header("Location: /admin/posts/");
            exit();
        }

        $data['categories'] = (new Category)->getAll_Categories();

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }


    // Hiển thị chi tiết
    public function show($id)
    {
        $data['post'] = $this->post->getById($id);

        if (empty($data['post'])) {
            die(404);
        }

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }

    // Xóa
    public function delete($id)
    {
        $post = $this->post->getByID($id);

        if (empty($post)) {
            die(404);
        }

        $this->post->deleteByID($id);

        if ($post['image'] && file_exists(PATH_ROOT . $post['image'])) {
            unlink(PATH_ROOT . $post['image']);
        }

        header('Location: /admin/posts');
        exit();
        // $this->post->deleteByID($id);
        // header('Location: /admin/posts');
        // exit();
    }
}
