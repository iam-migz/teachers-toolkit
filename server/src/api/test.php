<?php
use src\models\Student;

header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');

include_once '../../vendor/autoload.php';

if (!isset($_GET['school_id'])) {
	echo json_encode(['result' => 0, 'message' => 'missing id']);
	return;
}

// Instantiate object
$student = new Student();
extract($_GET);
$student->school_id = $school_id;
$result = $student->read();
$num = $result->rowCount();

if ($num > 0) {
	$students_arr = [];
	$students_arr['data'] = [];

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		$student_item = [
			'id' => $id,
			'user_id' => $user_id,
			'firstname' => $firstname,
			'lastname' => $lastname,
			'middlename' => $middlename,
			'email' => $email,
			'province' => $province,
			'city' => $city,
			'barangay' => $barangay,
			'gender' => $gender,
			'LRN' => $LRN,
			'birthdate' => $birthdate,
		];
		array_push($students_arr['data'], $student_item);
	}
	echo json_encode($students_arr);
} else {
	echo json_encode(['result' => 0, 'message' => 'No students Found']);
}
