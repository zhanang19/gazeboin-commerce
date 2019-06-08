<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */

class C_product extends Controller
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

    public function detail($product_slug = null)
    {
        $product = Product::get($product_slug);
        
        $data['product'] = $product ? $product : abort(404, 'Product not found :(');
        Product::updateTotalView($product_slug);
        
        $data['related_product'] = Product::relatedProduct($product_slug);
        
        $this->view('layouts/frontpage/header', $data);
        $this->view('frontpage/product_detail', $data);
        $this->view('layouts/frontpage/footer', $data);
    }

    public function category($category_slug = null)
    {
        // Get parameter using helper
        $get_parameter = get_parameter();
        // Get current page from parameter GET
        $page = is_array($get_parameter) && array_key_exists('page', $get_parameter) ? (int) $get_parameter['page'] : 1;
        $limit = 4;
        $product = Product::paginateByCategory($category_slug, $page, $limit);
        $data['product'] = $product ? $product : abort(204, 'No product on this category :(');
        $data['total_page'] = (int) ceil(Product::countByCategory($category_slug) / $limit);
        $data['current_page'] = $page;
        $data['category_slug'] = $category_slug;
        $data['popular'] = Product::popular(3);
        $data['category'] = Category::get(3);
        
        $this->view('layouts/frontpage/header', $data);
        $this->view('frontpage/product_category_page', $data);
        $this->view('layouts/frontpage/footer', $data);
    }

    public function page($page = 1)
    {
        $limit = 8;
        $data['total_page'] = (int) ceil(Product::count() / $limit);
        $data['current_page'] = (int) $page;
        $data['product'] = Product::paginate($page, $limit);
        $data['popular'] = Product::popular(3);
        $data['category'] = Category::get(3);
        
        $this->view('layouts/frontpage/header', $data);
        $this->view('frontpage/product_page', $data);
        $this->view('layouts/frontpage/footer', $data);
    }
}
