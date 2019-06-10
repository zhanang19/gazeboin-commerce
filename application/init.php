<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */


require_once 'config/config.php';
require_once 'core/helper.php';
require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/Database.php';

$_POST = array_map(function ($data) {
    return trim(htmlentities($data));
}, $_POST);

$_GET = array_map(function ($data) {
    return trim(htmlentities($data));
}, $_GET);