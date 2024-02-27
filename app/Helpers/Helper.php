<?php
if (!function_exists('asset')) {
    function asset($directory = "")
    {
        // Get the protocol (http or https)
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

        // Get the host
        $host = $_SERVER['HTTP_HOST'];

        // Construct the base URL
        $base_url = $protocol . '://' . $host;

        // Return the base URL concatenated with the directory
        return $base_url . dirname($_SERVER['PHP_SELF']) . '/' . $directory;
    }
}

if (!function_exists('action')) {
    function action($controller, $method)
    {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

        // Get the host
        $host = $_SERVER['HTTP_HOST'];

        // Construct the base URL
        $base_url = $protocol . '://' . $host;

        require  $base_url . dirname($_SERVER['PHP_SELF']) . '/' . $controller . '.php';
        $controller = new $controller();
        return $controller->$method();
    }
}


if (!function_exists('GETURL')) {
    function GETURL($a, $value = null)
    {
        $parts = parse_url($_SERVER['REQUEST_URI']);
        if (isset($parts) and $parts) :
            if (isset($parts['query'])) parse_str($parts['query'], $query);
        endif;
        return (isset($query[$a]) and $query[$a]) ? koru($query[$a]) : $value;
    }
}

if(!function_exists('koru')) {
    function koru($value)
    {
        return   $value = stripslashes($value);
    }
}
