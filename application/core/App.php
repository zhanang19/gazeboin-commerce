<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */

class App {

    protected $controller;
    protected $method;
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        $requested_controller = $url[0] ?? 'home';
        $controller_name = 'C_' . $requested_controller;
        $controller_path = '../application/controller/' . $controller_name . '.php';

        if(file_exists($controller_path) ) {
            $this->controller = $controller_name;
            unset($url[0]);
            require_once $controller_path;
            $this->controller = new $this->controller;

            $method_name = $url[1] ?? 'index';
            $method_name = str_replace('-', '_', $method_name);
            if(isset($method_name)) {
                if(method_exists($this->controller, $method_name)) {
                    $this->method = $method_name;
                    unset($url[1]);
                } else {
                    abort(404, "No route for this Request");
                }
            }
            
            if(! empty($url)) {
                $this->params = array_values($url);
            }
            
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else {
            abort(404, "No route for this Request");
        }
        
    }

    public function parseURL()
    {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}