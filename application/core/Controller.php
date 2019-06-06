<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */

class Controller {

    protected $error = [];

    public function view($view_name, $data = [])
    {
        $view_path = '../application/views/' . $view_name . '.php';
        try {
            if (! file_exists($view_path)) {
                throw new Exception("View <code>$view_name</code> not found", 1);
            } else {
                require $view_path;
            }
        } catch (Exception $e) {
            abort(500, $e->getMessage(), 'Error', $e->getTraceAsString());
        }
    }

    public function model($model_name)
    {
        $model_path = '../application/model/' . $model_name . '.php';
        try {
            if (! file_exists($model_path)) {
                throw new Exception("Model <code>$model_name</code> not found", 1);
            } else {
                require_once $model_path;
                return new $model_name;
            }
        } catch (Exception $e) {
            abort(500, $e->getMessage(), 'Error', $e->getTraceAsString());
        }
    }

    public function setUserdata($data = null)
    {
        $_SESSION['user'] = [];
        $_SESSION['user']['id_user'] = $data['id_user'];
        $_SESSION['user']['name'] = $data['name'];
        $_SESSION['user']['username'] = $data['username'];
        $_SESSION['user']['level'] = $data['level'];
        $_SESSION['user']['is_login'] = true;
    }

    public function getUserdata($key = '')
    {
        if (isset($_SESSION['user'])) {
            if (empty($key)) {
                return $_SESSION['user'];
            } else {
                return $_SESSION['user'][$key];
            }
        }
    }

    public function isAdmin()
    {
        if (isset($_SESSION['user']) && $_SESSION['user']['is_login'] === true) {
            if ($_SESSION['user']['level'] === '1') {
                return true;
            }
        }
        abort(401, 'Unathorized page');
    }

    /**
     * Use this method to check user in admin panel
     */
    public function isLogin()
    {
        if (isset($_SESSION['user']) && $_SESSION['user']['is_login'] === true) {
            return true;
        }
        set_flashdata('Unathorized Request', 'You must login first to access the resource', 'info');
        redirect('page/auth');
    }

    /**
     * Use this method to check is user not logged in, if logged in redirect user
     */
    public function isGuest()
    {
        if (! isset($_SESSION['user']) or $_SESSION['user']['is_login'] !== true) {
            return true;
        }
        if ($_SESSION['user']['level'] === '1') {
            redirect('admin/dashboard');
        } else {
            redirect('user/dashboard');
        }
    }

    public function unset_userdata()
    {
        session_destroy();
    }

    public function json($data = [], $http_code = 200)
    {
        http_response_code($http_code);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    /**
     * Fungsi ini berfungsi untuk memeriksa apakah suatu variabel sudah diset atau belum
     * serta memeriksa apakah isinya bukan null atau whitespace
     * 
     * @param String $data berisi data yang akan diperiksa
     * 
     * @return boolean
     */
    public function haveData($data)
    {
        if ($data !== "" && ! empty($data)) {
            return true;
        }
        return false;
    }

    public function validate($data, $rule, $field_name, $message = null)
    {
        switch ($rule) {
            case 'required':
                if (! isset($data[$field_name]) or ! $this->havedata($data[$field_name])) {
                    if (! array_key_exists($field_name, $this->error)) {
                        $this->error[$field_name] = $message ?? ucwords($field_name) . ' field is required';
                        $_SESSION['form_error'][$field_name] = $this->error[$field_name];
                    }
                }
                break;
            case 'valid_email':
                if (! preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $data[$field_name])) {
                    if (! array_key_exists($field_name, $this->error)) {
                        $this->error[$field_name] = $message ?? ucwords($field_name) . ' field must be a valid email address';
                        $_SESSION['form_error'][$field_name] = $this->error[$field_name];
                    }
                }
                break;
            case 'unique_username':
                if (! User::checkUsername($data[$field_name])) {
                    if (! array_key_exists($field_name, $this->error)) {
                        $this->error[$field_name] = $message ?? ucwords($field_name) . ' field must be unique. Try another one.';
                        $_SESSION['form_error'][$field_name] = $this->error[$field_name];
                    }
                }
                break;
            case 'unique_email':
                if (! User::checkEmail($data[$field_name])) {
                    if (! array_key_exists($field_name, $this->error)) {
                        $this->error[$field_name] = $message ?? ucwords($field_name) . ' field must be unique. Try another one.';
                        $_SESSION['form_error'][$field_name] = $this->error[$field_name];
                    }
                }
                break;
            case 'confirmed':
                if (isset($data[$field_name]) && isset($data[$field_name.'_confirmation']) && $data[$field_name] !== $data[$field_name.'_confirmation']) {
                    if (! array_key_exists($field_name.'_confirmation', $this->error)) {
                        $this->error[$field_name.'_confirmation'] = $message ?? ucwords($field_name) . ' Confirmation field must be match';
                        $_SESSION['form_error'][$field_name.'_confirmation'] = $this->error[$field_name.'_confirmation'];
                    }
                }
                break;
            default:
                break;
        }
    }
}