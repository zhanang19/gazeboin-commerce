<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */

class C_page extends Controller
{
    public function __construct()
    {
        $this->model('User');
        $this->model('Cart');
        $this->model('Product');
        $this->model('Order');
        $this->model('OrderDetail');
    }

    public function auth()
    {
        $this->isGuest();
        $data = [];
        $this->view('layouts/frontpage/header', $data);
        $this->view('frontpage/page_auth', $data);
        $this->view('layouts/frontpage/footer', $data);
        unset_old();
    }

    public function logout()
    {
        // $this->isLogin();
        $this->unset_userdata();
        redirect('page/auth');
    }

    public function login()
    {
        $data = $_POST;
        set_old($data);

        $this->validate($data, 'required', 'username_login', 'Username field is required');
        $this->validate($data, 'required', 'password_login', 'Password field is required');

        if (empty($this->error)) {
            $result = User::authenticate($data['username_login'], $data['password_login']);
            
            if ($result === false) {
                $this->json([
                    'username_login' => 'Username atau password salah',
                ], 401);
            }
            $this->setUserdata([
                'id_user' => $result['id'],
                'name' => $result['name'],
                'username' => $result['username'],
                'level' => $result['level'],
            ]);
            if ($result['level'] === 1) {
                $link = base_url('admin/dashboard');
            } else {
                $link = base_url('user/dashboard');
            }
            $this->json([
                'link' => $link
            ]);
        } else {
            $this->json($this->error, 422);
        }
    }

    public function register()
    {
        $data = $_POST;
        set_old($data);
        // validate registration
        $this->validate($data, 'required', 'name');
        $this->validate($data, 'required', 'address');
        $this->validate($data, 'required', 'username');
        $this->validate($data, 'required', 'email');
        $this->validate($data, 'required', 'password');
        $this->validate($data, 'required', 'password_confirmation', 'Password Confirmation field is required');
        $this->validate($data, 'valid_email', 'email');
        $this->validate($data, 'unique_email', 'email');
        $this->validate($data, 'unique_username', 'username');
        $this->validate($data, 'confirmed', 'password');
            
        if (empty($this->error)) {
            $result = User::create([
                'name' => $data['name'],
                'address' => $data['address'],
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);
            if ($result > 0) {
                $this->json([
                    'message' => 'Registrasi berhasil. Silahkan login untuk melanjutkan.'
                ]);
            }
        } else {
            $this->json($this->error, 422);
        }
    }

    public function cart()
    {
        $this->isLogin();
        $data = [];
        $id_user = get_userdata()['id_user'];
        $data['cart_count'] = Cart::count($id_user);
        $data['cart'] = Cart::all($id_user);
        $data['total_price'] = Cart::totalPrice($id_user);
        $this->view('layouts/frontpage/header', $data);
        $this->view('frontpage/page_cart', $data);
        $this->view('layouts/frontpage/footer', $data);
    }

    public function checkout()
    {
        $this->isLogin();
        $id_user = get_userdata()['id_user'];
        $product_count = Cart::count($id_user);
        $data['cart_count'] = $product_count > 0 ? $product_count : abort(422, 'Checkout failed. No item in cart.');
        $id_order = Order::create($id_user);
        if ($id_order > 0) {
            $cart = Cart::all($id_user);
            foreach ($cart as $product) {
                OrderDetail::insert($id_order, $product['product_slug'], $product['product_price']);
                Cart::remove($id_user, $product['product_slug']);
            }
            redirect('invoice/detail/' . $id_order);
        } else {
            set_flashdata('Request Failed', 'Failed to create an order', 'error');
            redirect('page/cart');
        }
        
    }

    public function about_us()
    {
        var_dump(Cart::get(2, 'matrial-template'));exit();
        echo "Halaman Tentang Kami";
    }

    public function privacy_policy()
    {
        echo "Halaman Privacy Policy";
    }

    public function terms_and_condition()
    {
        echo "Halaman Terms and Condition";
    }

}
