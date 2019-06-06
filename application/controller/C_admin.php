<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */

class C_admin extends Controller
{
    public function __construct()
    {
        $this->isLogin();
        $this->isAdmin();
        $this->model('User');
        $this->model('Category');
        $this->model('Product');
    }

    public function index()
    {
        redirect('admin/dashboard');
    }

    public function dashboard()
    {
        $data = [];
        $data['total_user'] = User::count();
        $data['total_category'] = Category::count();
        $data['total_product'] = Product::count();
        $this->view('layouts/panel/header', $data);
        $this->view('admin_panel/dashboard', $data);
        $this->view('layouts/panel/footer', $data);
    }

    public function user($action = 'index', $id = 0)
    {
        switch ($action) {
            case 'index':
                $data['users'] = User::all();
                $this->view('layouts/panel/header', $data);
                $this->view('admin_panel/user/index', $data);
                $this->view('layouts/panel/footer', $data);
                break;
            case 'create':
                $data['users'] = User::all();
                $this->view('layouts/panel/header', $data);
                $this->view('admin_panel/user/create', $data);
                $this->view('layouts/panel/footer', $data);
                break;
            case 'store':
                $request = $_POST;
                
            default:
                abort(404, 'Action not found');
        }
    }
}
