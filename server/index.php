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
use src\controllers\{StudentController, TeacherController, SubjectController, SectionController};
use src\controllers\{StudentAssignController, SubjectAssignController};


// for htdocs
if (str_contains($_SERVER['REQUEST_URI'], 'server')) {
	$_SERVER['REQUEST_URI'] = explode('server', $_SERVER['REQUEST_URI'])[1];
}

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
	$r->addGroup('/user', function (FastRoute\RouteCollector $r) {
		$r->addRoute('POST', '/login', UserController::class . '@login');
		$r->addRoute('GET', '/test', UserController::class . '@funBee');
	});

	$r->addGroup('/admin', function (FastRoute\RouteCollector $r) {
		$r->addRoute('POST', '/create', AdminController::class . '@create');
		$r->addRoute('GET', '/findOne/{id:\d+}', AdminController::class . '@findOne');
	});

	$r->addGroup('/school', function (FastRoute\RouteCollector $r) {
		$r->addRoute('POST', '/create', SchoolController::class . '@create');
		$r->addRoute('PUT', '/update', SchoolController::class . '@update');
		$r->addRoute('GET', '/findOne/{id:\d+}', SchoolController::class . '@findOne');
	});

	$r->addGroup('/schoolyear', function (FastRoute\RouteCollector $r) {
		$r->addRoute('POST', '/create', SchoolYearController::class . '@create');
		$r->addRoute('GET', '/findOne/{id:\d+}', SchoolYearController::class . '@findOne');
		$r->addRoute('GET', '/findAll/{id:\d+}', SchoolYearController::class . '@findAll');
	});

	$r->addGroup('/student', function (FastRoute\RouteCollector $r) {
		$r->addRoute('POST', '/create', StudentController::class . '@create');
		$r->addRoute('PUT', '/update', StudentController::class . '@update');
		$r->addRoute('GET', '/findOne/{id:\d+}', StudentController::class . '@findOne');
		$r->addRoute('GET', '/findBySchoolId/{id:\d+}', StudentController::class . '@findBySchoolId');
	});

	$r->addGroup('/teacher', function (FastRoute\RouteCollector $r) {
		$r->addRoute('POST', '/create', TeacherController::class . '@create');
		$r->addRoute('PUT', '/update', TeacherController::class . '@update');
		$r->addRoute('GET', '/findOne/{id:\d+}', TeacherController::class . '@findOne');
		$r->addRoute('GET', '/findBySchoolId/{id:\d+}', TeacherController::class . '@findBySchoolId');
	});

	$r->addGroup('/subject', function (FastRoute\RouteCollector $r) {
		$r->addRoute('POST', '/create', SubjectController::class . '@create');
		$r->addRoute('PUT', '/update', SubjectController::class . '@update');
		$r->addRoute('GET', '/findById/{id:\d+}', SubjectController::class . '@findById');
		$r->addRoute('GET', '/findBySchoolYearId/{id:\d+}', SubjectController::class . '@findBySchoolYearId');
		$r->addRoute('GET', '/findBySectionId/{id:\d+}', SubjectController::class . '@findBySectionId');
	});

	$r->addGroup('/section', function (FastRoute\RouteCollector $r) {
		$r->addRoute('POST', '/create', SectionController::class . '@create');
		$r->addRoute('PUT', '/update', SectionController::class . '@update');
		$r->addRoute('GET', '/findById/{id:\d+}', SectionController::class . '@findById');
		$r->addRoute('GET', '/findBySYID/{id:\d+}', SectionController::class . '@findBySYID');
		$r->addRoute('GET', '/findByAdvisorIdAndSYID/{id:\d+}/{sy_id:\d+}', SectionController::class . '@findByAdvisorIdAndSYID');
	});
	
	$r->addGroup('/studentassign', function (FastRoute\RouteCollector $r) {
		$r->addRoute('POST', '/create', StudentAssignController::class . '@create');
		$r->addRoute('GET', '/findUnassignedStudents/{id:\d+}', StudentAssignController::class . '@findUnassignedStudents');
		$r->addRoute('GET', '/findBySectionId/{id:\d+}', StudentAssignController::class . '@findBySectionId');
	});

	$r->addGroup('/subjectassign', function (FastRoute\RouteCollector $r) {
		$r->addRoute('POST', '/create', SubjectAssignController::class . '@create');
		$r->addRoute('GET', '/findBySYID/{id:\d+}', SubjectAssignController::class . '@findBySYID');
		$r->addRoute('GET', '/findTeacherSubjects/{id:\d+}/{sy_id:\d+}', SubjectAssignController::class . '@findTeacherSubjects');
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
