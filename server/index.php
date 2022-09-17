<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/vendor/autoload.php';

set_error_handler('src\ErrorHandler::handleError');
set_exception_handler('src\ErrorHandler::handleException');

header('Content-type: application/json; charset-UTF-8');

// for htdocs
if (str_contains($_SERVER['REQUEST_URI'], 'server')) {
	$_SERVER['REQUEST_URI'] = explode('server', $_SERVER['REQUEST_URI'])[1];
}

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
  $routes = require_once './src/routes.php';
  foreach($routes as $route) {
    $r->addRoute($route[0], $route[1], $route[2]);
  }
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== ($pos = strpos($uri, '?'))) {
	$uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
	case FastRoute\Dispatcher::NOT_FOUND:
		// ... 404 Not Found
		http_response_code(404);
		echo json_encode(['result' => 0, 'message' => 'not found']);
		break;
	case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
		$allowedMethods = $routeInfo[1];
		// ... 405 Method Not Allowed
		break;
	case FastRoute\Dispatcher::FOUND:
		$handler = $routeInfo[1];
		$vars = $routeInfo[2];
		// ... call $handler with $vars
		[$class, $method] = explode('@', $handler, 2);
		call_user_func_array([new $class(), $method], $vars);
		break;
}
