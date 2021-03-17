<?php
/*

//routes izvēlās kontrolieri balstoties uz adresi(blabla..) -> smth/blabla..

// $_REQUEST / $_GET / $_POST
// 1) izvēlēties request metodi(gets vai posts);
// 2) get un post pieprasījumiem katram ir CITA metode!!

use App\Controllers\HomeController;
use App\Controllers\ShopController;
$page = $_GET['page'] ?? 'home'; // ja nav iesetots, tad būs home (noklusējums);
//lai pēc atslēgas, kuru augšā ieraksta,izvēlās kontrolieri;
$routes = [
    'home' =>\App\Controller\HomeController::class, //::class pārveido par stringu,
    'shop' => ShopController::class
];
$controller = $routes[$page] ?? $routes['home']; // ja ievada adresi, kura neeksistē, tad ņem pēc noklusējuma
$controller = (new $controller)->index();
*/

require_once 'vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\ShopController;


//Request->/page (METHOD - GET/POST) - kad veido pieprasījumu uz konkrētu lapu
// GET or POST - seko pieprasījuma metde vainu GET vai POST
//balstoties uz adresi un metodi izvēlās SELECT HANDLER -> Controller + method
//unikāla adrese ir pati adrese+metode -> /page + method



//The routes are defined by calling the FastRoute\simpleDispatcher() function,
//which accepts a callable taking a FastRoute\RouteCollector instance.
//The routes are added by calling addRoute() on the collector instance:
//
//$r->addRoute($method, $routePattern, $handler);
//The $method is an uppercase HTTP method string for which a certain route should match.
//It is possible to specify multiple valid methods using an array


$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/home', [HomeController::class, 'index']);
    $r->addRoute('GET', '/shop', [ShopController::class,'index']);
});

//// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

//// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        [$class, $method] = $handler;
        call_user_func_array([new $class, $method], $vars);
        break;
}
