<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */

class Product
{
    private static $db;
    
    public function __construct()
    {
        self::$db = new Database;
    }

    public static function all()
    {
        self::$db->query("SELECT * FROM products");
        return self::$db->fetch();
    }

    public static function create($data = [])
    {
        self::$db->query("INSERT INTO products (product_name, product_slug, product_description, product_price, id_category, product_photo_1, status) VALUES (:product_name, :product_slug, :product_description, :product_price, :id_category, :product_photo_1, 1)");
        self::$db->bind('product_name', $data['product_name']);
        self::$db->bind('product_slug', $data['product_slug']);
        self::$db->bind('product_description', $data['product_description']);
        self::$db->bind('product_price', $data['product_price']);
        self::$db->bind('id_category', $data['id_category']);
        self::$db->bind('product_photo_1', $data['product_photo_1']);
        self::$db->execute();
        return self::$db->affectedRows();
    }

    public static function update($product_slug = '', $data =[])
    {
        self::$db->query("UPDATE products SET product_name = :product_name, product_price = :product_price, product_description = :product_description, id_category = :id_category WHERE product_slug = :product_slug");
        self::$db->bind('product_name', $data['product_name']);
        self::$db->bind('product_slug', $data['product_slug']);
        self::$db->bind('product_price', $data['product_price']);
        self::$db->bind('product_description', $data['product_description']);
        self::$db->bind('id_category', $data['id_category']);
        self::$db->execute();
        return self::$db->affectedRows();
    }

    public static function activate($product_slug = '')
    {
        self::$db->query("UPDATE products SET status = 1 WHERE product_slug = :product_slug");
        self::$db->bind('product_slug', $product_slug);
        self::$db->execute();
        return self::$db->affectedRows();
    }

    public static function deactivate($product_slug = '')
    {
        self::$db->query("UPDATE products SET status = 0 WHERE product_slug = :product_slug");
        self::$db->bind('product_slug', $product_slug);
        self::$db->execute();
        return self::$db->affectedRows();
    }

    public static function paginate($page = 1, $limit = 8)
    {
        $offset = $page - 1;
        if ($offset > 0) {
            $offset = $offset * $limit;
        }
        self::$db->query("SELECT p.*, c.category_name, c.category_slug FROM products AS p JOIN categories AS c ON c.id = p.id_category WHERE p.status = 1 LIMIT :limit OFFSET :offset");
        self::$db->bind('limit', $limit);
        self::$db->bind('offset', $offset);
        return self::$db->fetch();
    }

    public static function paginateByCategory($category_slug = '', $page = 1, $limit = 8)
    {
        $offset = $page - 1;
        if ($offset > 0) {
            $offset = $offset * $limit;
        }
        self::$db->query("SELECT p.*, c.category_name, c.category_slug FROM products AS p JOIN categories AS c ON c.id = p.id_category WHERE c.category_slug = :category_slug AND p.status = 1 LIMIT :limit OFFSET :offset");
        self::$db->bind('category_slug', $category_slug);
        self::$db->bind('limit', $limit);
        self::$db->bind('offset', $offset);
        return self::$db->fetch();
    }

    public static function get($product_slug = '')
    {
        self::$db->query("SELECT p.*, c.category_name, c.category_slug, c.id AS id_category FROM products AS p JOIN categories AS c ON c.id = p.id_category WHERE product_slug = :product_slug");
        self::$db->bind('product_slug', $product_slug);
        return self::$db->first();
    }

    public static function updateTotalView($product_slug = '')
    {
        self::$db->query("UPDATE products SET views = views + 1 WHERE product_slug = :product_slug");
        self::$db->bind('product_slug', $product_slug);
        self::$db->execute();
        return self::$db->affectedRows();
    }

    public static function getByCategory($category_slug = '', $limit = 8)
    {
        self::$db->query("SELECT p.*, c.category_name, c.category_slug, c.id AS id_category FROM products AS p JOIN categories AS c ON c.id = p.id_category WHERE category_slug = :category_slug AND p.status = 1 LIMIT :limit");
        self::$db->bind('category_slug', $category_slug);
        self::$db->bind('limit', $limit);
        return self::$db->fetch();
    }

    public static function relatedProduct($product_slug = '', $limit = 3)
    {
        self::$db->query("SELECT * FROM products AS p JOIN categories AS c ON c.id = p.id_category WHERE product_slug <> :product_slug AND id_category IN (SELECT c.id AS id_category FROM products AS p JOIN categories AS c ON c.id = p.id_category WHERE product_slug = :product_slug) LIMIT :limit");
        self::$db->bind('product_slug', $product_slug);
        self::$db->bind('limit', $limit);
        return self::$db->fetch();
    }

    public static function count()
    {
        return self::$db->countRows("products");
    }

    public static function countByCategory($category_slug = '')
    {
        self::$db->query("SELECT COUNT(p.id) as row_count FROM products AS p JOIN categories AS c ON c.id = p.id_category WHERE category_slug = :category_slug AND status = 1");
        self::$db->bind('category_slug', $category_slug);
        // var_dump(self::$db->first());exit();
        return self::$db->first()['row_count'];
    }

    public static function popular($limit = 1)
    {
        self::$db->query("SELECT p.*, c.category_name, c.category_slug FROM products AS p JOIN categories AS c ON c.id = p.id_category WHERE p.status = 1 ORDER BY p.views DESC LIMIT :limit");
        self::$db->bind('limit', $limit);
        return self::$db->fetch();
    }

    public static function bestSeller($limit = 1)
    {
        self::$db->query("SELECT p.* FROM products AS p JOIN orders AS o ON o ORDER BY views DESC LIMIT :limit");
        self::$db->bind('limit', $limit);
        return self::$db->fetch();
    }
}
