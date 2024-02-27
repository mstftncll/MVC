<?php
/*
if ($_SERVER['REQUEST_URI'] === '/' || $_SERVER['REQUEST_URI'] === '/index.php') {
    $home = asset('login');
    return $home;
    header("Location: $home");
    exit;
}
*/
$routes = [
    'GET' => [
        '' => ['controller' => 'LoginController', 'method' => 'login'],
        'login' => ['controller' => 'LoginController', 'method' => 'login'],
        'product' => ['controller' => 'ProductController', 'method' => 'product'],
        'product-create' => ['controller' => 'ProductController', 'method' => 'productcreate'],
        'product-delete' => ['controller' => 'ProductController', 'method' => 'productdelete'],
        'product-update' => ['controller' => 'ProductController', 'method' => 'productupdate'],
        'category' => ['controller' => 'CategoryController', 'method' => 'category'],
        'category-create' => ['controller' => 'CategoryController', 'method' => 'categorycreate'],
        'category-delete' => ['controller' => 'CategoryController', 'method' => 'categorydelete'],
        'category-update' => ['controller' => 'CategoryController', 'method' => 'categoryupdate'],
    ],
    'POST' => [

        'login' => ['controller' => 'LoginController', 'method' => 'login'],

        'product-create' => ['controller' => 'ProductController', 'method' => 'productadd', 'params' => ['png', 'jpg']],
        'product-update' => ['controller' => 'ProductController', 'method' => 'productupdate'],
        'category' => ['controller' => 'CategoryController', 'method' => 'categoryadd', 'params' => ['png', 'jpg']],
        'category-create' => ['controller' => 'CategoryController', 'method' => 'categoryadd'],
        'category-update' => ['controller' => 'CategoryController', 'method' => 'categoryupdate'],
    ]
];


$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = explode('/', $_SERVER['REQUEST_URI'])[2];

if (!function_exists('getID')) {
    function getID()
    {
        return explode('/', $_SERVER['REQUEST_URI'])[3];
    }
}

if (isset($routes[$requestMethod][$requestUri])) {
    $route = $routes[$requestMethod][$requestUri];
    $controllerName = $route['controller'];
    $methodName = $route['method'];

    include_once 'app/controllers/' . $controllerName . '.php';
    $controller = new $controllerName();

    if (isset($route['params'])) {
        $params = $route['params'];
        $controller->$methodName(...$params);
    } else {
        $controller->$methodName();
    }
} else {
    http_response_code(404);
    echo "404 Not Found";
}