<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */

class Cart
{
    private static $db;
    
    public function __construct()
    {
        self::$db = new Database;
    }

    public static function all($id_user = 0)
    {
        self::$db->query("SELECT c.id AS id_cart, p.* FROM carts AS c JOIN products AS p ON p.product_slug = c.product_slug WHERE id_user = :id_user");
        self::$db->bind('id_user', (int) $id_user);
        return self::$db->fetch();
    }

    public static function totalPrice($id_user = 0)
    {
        self::$db->query("SELECT SUM(p.product_price) AS total_price FROM carts AS c JOIN products AS p ON p.product_slug = c.product_slug WHERE id_user = :id_user");
        self::$db->bind('id_user', (int) $id_user);
        return self::$db->first()['total_price'];
    }

    public static function get($id_user = 0, $product_slug = '')
    {
        self::$db->query("SELECT * FROM carts WHERE id_user = :id_user AND product_slug = :product_slug");
        self::$db->bind('id_user', $id_user);
        self::$db->bind('product_slug', $product_slug);
        return self::$db->fetch();
    }

    public static function add($id_user = 0, $product_slug = '')
    {
        self::$db->query("INSERT INTO carts (id_user, product_slug) VALUES (:id_user, :product_slug)");
        self::$db->bind('id_user', $id_user);
        self::$db->bind('product_slug', $product_slug);
        self::$db->execute();
        return self::$db->affectedRows();
    }

    public static function remove($id_user = 0, $product_slug = '')
    {
        self::$db->query("DELETE FROM carts WHERE product_slug = :product_slug AND id_user = :id_user");
        self::$db->bind('id_user', $id_user);
        self::$db->bind('product_slug', $product_slug);
        self::$db->execute();
        return self::$db->affectedRows();
    }

    public static function count($id_user = 0)
    {
        return (int) self::$db->countRows("carts", 'id_user', $id_user);
    }

}
