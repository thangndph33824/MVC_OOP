<?php
namespace Admin\MvcOop\Controllers\Admin;

use Admin\MvcOop\Commons\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return $this->renderViewAdmin('dashboard');
    }
}