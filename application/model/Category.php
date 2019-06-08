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

    public static function all()
    {
        self::$db->query("SELECT * FROM categories");
        return self::$db->fetch();
    }

    public static function create($data = [])
    {
        self::$db->query("INSERT INTO categories (category_name, category_slug) VALUES (:category_name, :category_slug)");
        self::$db->bind('category_name', $data['category_name']);
        self::$db->bind('category_slug', $data['category_slug']);
        self::$db->execute();
        return self::$db->affectedRows();
    }

    public static function checkSlug($slug = '')
    {
        self::$db->query("SELECT id FROM categories WHERE category_slug = :category_slug");
        self::$db->bind('category_slug', $data['category_slug']);
        self::$db->execute();
        $result = self::$db->first();
        if (empty($result)) {
            return true;
        }
        return false;
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
