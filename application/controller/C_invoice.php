<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 14/05/2019
 * Time: 04:21
 * Project: e-commerce
 */

class C_invoice extends Controller
{
    public function __construct()
    {
        $this->isLogin();
        $this->model('Cart');
        $this->model('Order');
        $this->model('OrderDetail');
    }

    public function detail($id_order = 0)
    {
        $this->isLogin();
        $id_user = get_userdata()['id_user'];
        $data['order'] = !empty(Order::get($id_order, $id_user)) ? Order::get($id_order, $id_user) : abort(404, "Invoice $id_order not found");
        $data['id_order'] = $id_order;
        $data['total_order'] = OrderDetail::totalPrice($id_order);
        $data['order_detail'] = OrderDetail::get($id_order);
        
        $data['total_price'] = Cart::totalPrice($id_user);
        $this->view('layouts/frontpage/header', $data);
        $this->view('frontpage/page_invoice', $data);
        $this->view('layouts/frontpage/footer', $data);
    }

    public function confirm($id_order = 0)
    {
        $this->isLogin();
        $id_user = get_userdata()['id_user'];
        if (empty(Order::get($id_order, $id_user))) {
            abort(404, "Invoice $id_order not found");
        }
        $result = Order::status($id_order, 'confirm transfer');
        if ($result > 0) {
            set_flashdata('Request Success', 'Confirm transfer success', 'success');
        } else {
            set_flashdata('Request Failed', 'Failed to confirm transfer', 'error');
        }
        redirect('invoice/detail/' . $id_order);
    }
}
