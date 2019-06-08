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
        $id_user = $this->getUserdata('id_user');
        switch ($action) {
            case 'index':
                $data['users'] = User::all();
                $this->view('layouts/panel/header', $data);
                $this->view('admin_panel/user/index', $data);
                $this->view('layouts/panel/footer', $data);
                unset_old();
                break;
            case 'create':
                $data = [];
                $this->view('layouts/panel/header', $data);
                $this->view('admin_panel/user/create', $data);
                $this->view('layouts/panel/footer', $data);
                unset_old();
                break;
            case 'store':
                $request = $_POST;
                set_old($request);
                $this->validate($request, 'required', 'name');
                $this->validate($request, 'required', 'address');
                $this->validate($request, 'required', 'username');
                $this->validate($request, 'unique_username', 'username');
                $this->validate($request, 'required', 'email');
                $this->validate($request, 'valid_email', 'email');
                $this->validate($request, 'unique_email', 'email');
                $this->validate($request, 'required', 'password');
                $this->validate($request, 'required', 'password_confirmation');
                $this->validate($request, 'confirmed', 'password');
                $this->validate($request, 'required', 'level');
                if (! empty($this->error)) {
                    redirect('admin/user/create');
                }
                $result = User::create($request);
                if ($result > 0) {
                    set_flashdata('Request Success', 'User created successfully', 'success');
                    redirect('admin/user');
                } else {
                    set_flashdata('Request Failed', 'Failed to create the user', 'error');
                    redirect('admin/user/create');
                }
                break;
            case 'edit':
                $data['user'] = User::get($id) ?: abort(404, "User with ID $id not found");
                $this->view('layouts/panel/header', $data);
                $this->view('admin_panel/user/edit', $data);
                $this->view('layouts/panel/footer', $data);
                unset_old();
                break;
            case 'update':
                $request = $_POST;
                unset($request['username']);
                unset($request['email']);
                unset($request['password']);
                unset($request['status']);
                if ($request['id'] === $id_user) {
                    abort(422, 'Can\'t edit active user');    
                }
                set_old($request);
                $this->validate($request, 'required', 'name');
                $this->validate($request, 'required', 'address');
                $this->validate($request, 'required', 'level');
                if (! empty($this->error)) {
                    redirect('admin/user/edit/' . $request['id']);
                }
                $result = User::update($request['id'], $request);
                if ($result > 0) {
                    set_flashdata('Request Success', 'User updated successfully', 'success');
                } else {
                    set_flashdata('Request Failed', 'Failed to update the user', 'error');
                }
                redirect('admin/user');
                break;
            case 'block':
                if ($id === $id_user) {
                    abort(422, 'Can\'t edit active user');    
                }
                $result = User::block($id);
                if ($result > 0) {
                    set_flashdata('Request Success', 'User blocked successfully', 'success');
                } else {
                    set_flashdata('Request Failed', 'Failed to update the user', 'error');
                }
                redirect('admin/user');
                break;
            case 'unblock':
                if ($id === $id_user) {
                    abort(422, 'Can\'t edit active user');    
                }
                $result = User::unblock($id);
                if ($result > 0) {
                    set_flashdata('Request Success', 'User unblocked successfully', 'success');
                } else {
                    set_flashdata('Request Failed', 'Failed to update the user', 'error');
                }
                redirect('admin/user');
                break;
            default:
                abort(404, 'Action not found');
        }
    }

    public function category($action = 'index', $id = 0)
    {
        $id_user = $this->getUserdata('id_user');
        switch ($action) {
            case 'index':
                $data['categories'] = Category::all();
                $this->view('layouts/panel/header', $data);
                $this->view('admin_panel/category/index', $data);
                $this->view('layouts/panel/footer', $data);
                unset_old();
                break;
            default:
                break;
        }
    }
    
}
