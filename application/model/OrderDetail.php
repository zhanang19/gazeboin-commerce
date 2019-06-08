<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 13/05/2019
 * Time: 07:21
 * Project: e-commerce
 */

class OrderDetail
{
    private static $db;
    
    public function __construct()
    {
        self::$db = new Database;
    }

    public static function insert($id_order = 0, $product_slug = '', $product_price = 0)
    {
        self::$db->query("INSERT INTO order_detail (id_order, product_slug, product_price) VALUES (:id_order, :product_slug, :product_price)");
        self::$db->bind('id_order', $id_order);
        self::$db->bind('product_slug', $product_slug);
        self::$db->bind('product_price', $product_price);
        self::$db->execute();
        return self::$db->lastInsertId();
    }

    public static function get($id_order = 0)
    {
        self::$db->query("SELECT od.id, od.product_price AS price, p.product_name, p.product_slug FROM order_detail AS od JOIN products AS p ON p.product_slug = od.product_slug WHERE od.id_order = :id_order");
        self::$db->bind('id_order', $id_order);
        // var_dump(self::$db->fetch());exit();
        return self::$db->fetch();
    }

    public static function totalPrice($id_order = 0)
    {
        self::$db->query("SELECT SUM(product_price) AS total FROM order_detail WHERE id_order = :id_order");
        self::$db->bind('id_order', $id_order);
        return self::$db->first()['total'];
    }

    public static function count($id_user = 0)
    {
        return (int) self::$db->countRows("carts", 'id_user', $id_user);
    }

}
