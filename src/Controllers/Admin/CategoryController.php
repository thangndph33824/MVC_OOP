<?php
namespace Admin\MvcOop\Controllers\Admin;

use Admin\MvcOop\Commons\Controller;
use Admin\MvcOop\Models\Category;

class CategoryController extends Controller
{
    private Category $category;
    private string $folder = 'category.';

    public function __construct()
    {
        $this->category = new Category;
    }

    // Danh sách
    public function index()
    {
        $data['categories'] = $this->category->getAll_Categories();

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }

    // Thêm mới
    public function create()
    {
        if (!empty($_POST)) {
            $this->category->insert_Categories($_POST['name']);

            header('Location: /admin/category');
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }

    public function update($id)
    {
        $data['categories'] = $this->category->getById_Categories($id);



        if (!empty($_POST)) {
            $this->category->update_Categories(
                $id,
                $_POST['name'],
            );
            header("Location: /admin/category/");
            exit();
        }
        // if (empty($data['Categories'])) {
        //     die(404);
        // }

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }

    public function show($id)
    {
        $data['category'] = $this->category->getById_Categories($id);
        if (empty($data['category'])) {
            die(404);
        }
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }

    public function delete($id)
    {
        $this->category->deleteByID_Categories($id);
        header('Location: /admin/category');
        exit();
    }
}
