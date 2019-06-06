<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 13/05/2019
 * Time: 07:21
 * Project: e-commerce
 */

class Order
{
    private static $db;
    
    public function __construct()
    {
        self::$db = new Database;
    }

    public static function create($id_user = 0)
    {
        self::$db->query("INSERT INTO orders (id_user, status) VALUES (:id_user, :status)");
        self::$db->bind('id_user', $id_user);
        self::$db->bind('status', 'unpaid');
        self::$db->execute();
        return self::$db->lastInsertId();
    }

    public static function get($id_order = 0, $id_user = 0)
    {
        self::$db->query("SELECT u.name, u.email, u.address, u.timestamp, o.* FROM orders AS o JOIN users AS u ON u.id = o.id_user WHERE o.id = :id AND o.id_user = :id_user");
        self::$db->bind('id', $id_order);
        self::$db->bind('id_user', $id_user);
        return self::$db->first();
    }

    public static function status($id_order = 0, $status = 'unpaid')
    {
        self::$db->query("UPDATE orders SET status = :status WHERE id = :id");
        self::$db->bind('id', $id_order);
        self::$db->bind('status', $status);
        self::$db->execute();
        return self::$db->affectedRows();
    }

    public static function count($id_user = 0)
    {
        return (int) self::$db->countRows("carts", 'id_user', $id_user);
    }

}
