<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */

if( ! session_id() ) session_start();

require_once '../application/init.php';

$app = new App;