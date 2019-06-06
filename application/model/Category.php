<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */

class Category
{
    private static $db;
    
    public function __construct()
    {
        self::$db = new Database;
    }

    public static function get($limit = 0)
    {
        self::$db->query("SELECT * FROM categories LIMIT :limit");
        self::$db->bind('limit', $limit);
        return self::$db->fetch();
    }

    public static function count()
    {
        return self::$db->countRows('categories');
    }

}
