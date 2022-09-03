<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/vendor/autoload.php';

// error handlers
set_error_handler("src\ErrorHandler::handleError");
set_exception_handler('src\ErrorHandler::handleException');

header('Content-type: application/json; charset-UTF-8');
use src\controllers\{UserController, AdminController, SchoolController, SchoolYearController};
use src\controllers\{StudentController, TeacherController};


// for htdocs
if (str_contains($_SERVER['REQUEST_URI'], 'server')) {
	$_SERVER['REQUEST_URI'] = explode('server', $_SERVER['REQUEST_URI'])[1];
}

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
	$r->addGroup('/user', function (FastRoute\RouteCollector $r) {
		$r->addRoute('GET', '/test', UserController::class . '@funBee');
		$r->addRoute('POST', '/login', UserController::class . '@login');
	});

	$r->addGroup('/admin', function (FastRoute\RouteCollector $r) {
		$r->addRoute('GET', '/findOne/{id:\d+}', AdminController::class . '@findOne');
		$r->addRoute('POST', '/create', AdminController::class . '@create');
	});

	$r->addGroup('/school', function (FastRoute\RouteCollector $r) {
		$r->addRoute('POST', '/create', SchoolController::class . '@create');
		$r->addRoute('GET', '/findOne/{id:\d+}', SchoolController::class . '@findOne');
		$r->addRoute('PUT', '/update', SchoolController::class . '@update');
	});

	$r->addGroup('/schoolyear', function (FastRoute\RouteCollector $r) {
		$r->addRoute('POST', '/create', SchoolYearController::class . '@create');
		$r->addRoute('GET', '/findOne/{id:\d+}', SchoolYearController::class . '@findOne');
		$r->addRoute('GET', '/findAll/{id:\d+}', SchoolYearController::class . '@findAll');
	});

	$r->addGroup('/student', function (FastRoute\RouteCollector $r) {
		$r->addRoute('GET', '/findOne/{id:\d+}', StudentController::class . '@findOne');
		$r->addRoute('GET', '/findBySchoolId/{id:\d+}', StudentController::class . '@findBySchoolId');
		$r->addRoute('POST', '/create', StudentController::class . '@create');
		$r->addRoute('PUT', '/update', StudentController::class . '@update');
	});

	$r->addGroup('/teacher', function (FastRoute\RouteCollector $r) {
		$r->addRoute('GET', '/findOne/{id:\d+}', TeacherController::class . '@findOne');
		$r->addRoute('GET', '/findBySchoolId/{id:\d+}', TeacherController::class . '@findBySchoolId');
		$r->addRoute('POST', '/create', TeacherController::class . '@create');
		$r->addRoute('PUT', '/update', TeacherController::class . '@update');
	});

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
		call_user_func_array([new $class, $method], $vars);
		break;
}
