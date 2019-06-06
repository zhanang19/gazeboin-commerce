<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */

class C_cart extends Controller
{
    public function __construct()
    {
        $this->isLogin();
        $this->model('User');
        $this->model('Product');
        $this->model('Cart');
    }

    public function add($product_slug = '')
    {
        $id_user = (int) $_SESSION['user']['id_user'];
        if (empty(Cart::get($id_user, $product_slug))) {
            $result = Cart::add($id_user, $product_slug);
            if ($result === 1) {
                set_flashdata('Request Success', 'Product has succesfully added to cart', 'success');
            } else {
                set_flashdata('Request Failed', 'Failed to add product to cart', 'error');
            }
        } else {
            set_flashdata('Request Failed', 'Product has already added to cart', 'error');
        }
        redirect('page/cart');
    }

    public function remove($product_slug = '')
    {
        $id_user = (int) $_SESSION['user']['id_user'];
        $result = Cart::remove($id_user, $product_slug);
        if ($result === 1) {
            set_flashdata('Request Success', 'Product has succesfully removed from cart', 'success');
        } else {
            set_flashdata('Request Failed', 'Failed to remove product from cart', 'error');
        }
        redirect('page/cart');
    }
}
