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
 * Send http error code and error page view
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
 * Use this helper to check user in admin panel on view
 */
function isLogin()
{
    if (isset($_SESSION['user']) && $_SESSION['user']['is_login'] === true) {
        return true;
    }
    return false;
}

/**
 * Redirect helper, useful to redirect user, created only to simplify code
 */
function redirect($path = '')
{
    header("Location: " . base_url($path));
    exit();
}

/**
 * Get userdata helper, this helper created cause needed on view
 */
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

/**
 * Set form error, useful in generating error to user
 */
function set_form_error($field_name = '', $error_message)
{
    if (! isset($_SESSION['form_error'][$field_name])) {
        $_SESSION['form_error'][$field_name] = $error_message;
    }
    return true;
}

/**
 * Get form error message
 */
function form_error($field_name = '')
{
    if (isset($_SESSION['form_error'][$field_name]) && ! empty($_SESSION['form_error'][$field_name])) {
        $error_message = $_SESSION['form_error'][$field_name];
        unset($_SESSION['form_error'][$field_name]);
        return '<span class="text-danger">'.$error_message.'</span>';
    }
}

/**
 * Set old input
 */
function set_old($input)
{
    unset($_SESSION['old_input']);
    $_SESSION['old_input'] = $input;
    return true;
}

/**
 * Unset old input
 */
function unset_old()
{
    if (isset($_SESSION['old_input'])) {
        unset($_SESSION['old_input']);
    }
}

/**
 * Get old input
 */
function old($field_name = '', $default_value = null)
{
    if (isset($_SESSION['old_input'][$field_name])) {
        $old_input = $_SESSION['old_input'][$field_name];
        unset($_SESSION['old_input'][$field_name]);
        return $old_input;
    } else {
        return $default_value;
    }
}

/**
 * Encryption helper, use openssl instead of mcrypt cause need encryption and decrytion feature
 */
function encrypt($data = '')
{
    $key = base64_decode(APP_KEY);
    $cipher_method = 'AES-256-CBC';
    $separator = '::';
    $iv_length = openssl_cipher_iv_length($cipher_method);

    $iv = base64_encode(openssl_random_pseudo_bytes($iv_length));
    $iv = substr($iv, 0, $iv_length);

    $encryptedData = openssl_encrypt($data, $cipher_method, $key, 0, $iv);

    return base64_encode($encryptedData.$separator.$iv);
}

/**
 * Decryption helper, use openssl instead of mcrypt cause need encryption and decrytion feature
 */
function decrypt($data = '')
{
    $key = base64_decode(APP_KEY);
    $cipher_method = 'AES-256-CBC';
    $separator = '::';
    $iv_length = openssl_cipher_iv_length($cipher_method);
    $encodedData = base64_decode($data);
    list($encryptedData, $iv) = strpos($encodedData, $separator) ? explode($separator, $encodedData, 2) : abort(404, 'Encrypted data not valid');
    // list($encryptedData, $iv) = explode($separator, $encodedData, 2);
    $iv = substr($iv, 0, $iv_length);

    error_reporting(0);
    return openssl_decrypt($encryptedData, $cipher_method, $key, 0, $iv);
}

/**
 * Download helper, to download zip file
 */
function download($file = '')
{
    if (! headers_sent()) {
        if (! is_file($file)) {
            abort(404, 'File not found. Please contact admin.');
        }
        if (! is_readable($file)) {
            abort(403, 'File not readable. Please contact admin.');
        } else {
            header('Content-Type: application/zip');
            header('Content-Transfer-Encoding: Binary');
            header('Content-Length: ' . filesize($file));
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            readfile($file);
            exit;
        }
    }
}