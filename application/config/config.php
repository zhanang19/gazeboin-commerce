<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:28
 * Project: e-commerce
 */

define('ENV', 'local');
define('APP', '../application/');
define('VIEWS', APP . 'views/');
define('DB_HOST', 'localhost');
define('DB_PORT', 3306);
define('DB_NAME', 'shop_id');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('BASEURL', 'http://shop.id/');

switch (ENV) {
    case 'local':
        error_reporting(E_ALL|E_STRICT);
        break;
    case 'testing':
        error_reporting(E_ERROR);
        break;
    case 'production':
        error_reporting(0);
        break;
    default:
        error_reporting(0);
        break;
}