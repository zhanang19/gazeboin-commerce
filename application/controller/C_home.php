<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */

class C_home extends Controller
{
    public function __construct()
    {
        $this->model('Product');
        $this->model('Category');
    }

    public function index()
    {
        $limit = 8;
        $data['current_page'] = 1;
        $data['total_page'] = ceil(Product::count() / $limit);
        $data['product'] = Product::paginate(1, $limit);
        $data['popular'] = Product::popular(3);
        $data['category'] = Category::get(3);
        
        $this->view('layouts/frontpage/header', $data);
        $this->view('frontpage/homepage', $data);
        $this->view('layouts/frontpage/footer', $data);
    }

}
