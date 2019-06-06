<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */

 
/**
 * Return base url for this project base on config
 */
function base_url($path = '')
{
    return BASEURL . ltrim($path, '/');
}

/**
 * Return the full current URL
 * E.g., http://shop.id/product/detail/html-template
 */
function current_url()
{
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $protocol = "https://"; 
    }else {
        $protocol = "http://"; 
    }
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    return $url;
}

/**
 * Return uri string without domain
 * E.g., product/detail/html-template
 */
function uri_string()
{
    return str_replace(base_url(), '', current_url());
}

/**
 * Helper to return a slug string
 */
function slug($string = '')
{
    return preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
}

/**
 * Send http error code and send error page view
 */
function abort($error_code = 404, $message = '', $title = '', $trace = '')
{
    $data['title'] = $title;
    $data['code'] = $error_code;
    $data['message'] = $message;
    $data['trace'] = $trace;
    $error_data = json_encode($data);
    http_response_code($error_code);
    if ($error_code === 403 or $error_code === 500) {
        error_log(date('D, d M Y H:i:s', time()) . " - $error_code - $error_data");
    }
    require VIEWS . '/error/error.php';
    exit();
}

/**
 * Count the previous page cursor
 */
function previous_page($current_page)
{
    return (int) $current_page - 1;
}

/**
 * Count the next page cursor
 */
function next_page($current_page)
{
    return (int) $current_page + 1;
}

/**
 * Set a flashdata
 */
function set_flashdata($title, $message, $type)
{
    $_SESSION['flash'] = [
        'title'    => $title ?? '',
        'message'  => $message ?? '',
        'type'     => $type ?? 'warning'
    ];
}

/**
 * Check the flashdata
 */
function has_flashdata()
{
    if (isset($_SESSION['flash'])) {
        return true;
    }
    return false;
}

/**
 * Return the flashdata
 */
function get_flashdata()
{
    if (has_flashdata()) {
        $data = $_SESSION['flash'];
		$type = $data['type'];
		$message = $data['message'];
		$title = $data['title'];
		echo "
		<script>
		$(function () {
			setTimeout(function() {
				toastr.$type('$message', '$title', {timeOut: 5000})
			}, 500)
		});
		</script>";
        unset($_SESSION['flash']);
    }
}

/**
 * Return global GET value
 * This helper created cause the param have been converted in .htaccess
 */
function get_parameter()
{
    $get = explode('/', uri_string());
    $get = explode('?', end($get));
    // var_dump($get);exit();
    if(count($get) > 1) {
        $get_param = [];
        $get = explode('&', end($get));
        foreach ($get as $row) {
            $row = explode('=', $row);
            $get_param[$row[0]] = $row[1];
            array_push($get_param, $get_param);
        }
        return $get_param;
    }
    return false;
}

/**
 * Fungsi ini berfungsi untuk memeriksa apakah suatu variabel sudah diset atau belum
 * serta memeriksa apakah isinya bukan null atau whitespace
 * 
 * @param String $data berisi data yang akan diperiksa
 * 
 * @return boolean
 */
function haveData($data)
{
    if (isset($data) && $data !== "" && ! empty($data)) {
        return true;
    }
    return false;
}

/**
 * Fungsi ini berfungsi untuk mengatur
 * 
 * @param String $key berupa indeks alias nama field yang error
 * @param String $message berupa isi pesan error
 * 
 * @return void
 */
function setErrorMessage($key, $message)
{
    // ambil variabel global untuk diperbarui,
    // ini dilakukan karena php menganut variable scope
    global $error, $is_error;
    // Mencegah pesan error yg sudah ada di replace
    if (! array_key_exists($key, $error)) {
        $error[$key] = $message;
    }
    $is_error = true;
}

/**
 * Use this method to check user in admin panel
 */
function isLogin()
{
    if (isset($_SESSION['user']) && $_SESSION['user']['is_login'] === true) {
        return true;
    }
    return false;
}

/**
 * Redirect
 */
function redirect($path = '')
{
    header("Location: " . base_url($path));
    exit();
}

function get_userdata($key = '')
{
    if (isset($_SESSION['user'])) {
        if (empty($key)) {
            return $_SESSION['user'];
        } else {
            return $_SESSION['user'][$key];
        }
    }
}

function set_form_error($field_name = '')
{
    if (! isset($_SESSION['form_error'][$field_name])) {
        # code...
    }
    return true;
}

/**
 * Get form error message
 */
function form_error($field_name = '')
{
    if (isset($_SESSION['form_error'][$field_name]) && ! empty($_SESSION['form_error'][$field_name])) {
        return $_SESSION['form_error'][$field_name];
    }
}