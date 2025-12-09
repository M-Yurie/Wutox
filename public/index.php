<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/app/Core/Router.php';
require BASE_PATH . '/app/Controllers/Controller.php';
require BASE_PATH . '/app/Controllers/HomeController.php';

use App\Core\Router;
use App\Controllers\HomeController;

// routing
$router = new Router();

$router->get('/', function () {
    $controller = new HomeController();
    $controller->index();
});

// resolve request
$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = '/' . trim(str_replace($scriptDir, '', $requestUri), '/');
if ($path === '//') $path = '/';

$router->dispatch($path, $_SERVER['REQUEST_METHOD']);
