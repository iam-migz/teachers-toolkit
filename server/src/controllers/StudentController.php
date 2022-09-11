<?php

namespace src\controllers;
use src\models\{User, Student};

class StudentController
{
	private Student $StudentModel;
	public function __construct()
	{
		$this->StudentModel = new Student();
	}

	public function findOne($id)
	{
		$result = $this->StudentModel->findOne((int) $id);
		if ($result !== false) {
			echo json_encode(['result' => 1, 'data' => $result]);
			return;
		}
		http_response_code(404);
		echo json_encode(['result' => 0, 'message' => 'not found']);
	}
	// public function findByUserId($id)
	// {
	//   $result = $this->StudentModel->findByUserId((int)$id);
	//   if ($result !== false) {
	//     echo json_encode(["result" => 1, "data" => $result]);
	//     return;
	//   }
	//   http_response_code(404);
	//   echo json_encode(["result" => 0, "message" => "not found"]);
	// }
	public function findBySchoolId($id)
	{
		$result = $this->StudentModel->findBySchoolId((int) $id);
		if ($result !== false) {
			echo json_encode(['result' => 1, 'data' => $result]);
			return;
		}
		http_response_code(404);
		echo json_encode(['result' => 0, 'message' => 'not found']);
	}

	public function create()
	{
		$data = (array) json_decode(file_get_contents('php://input'), true);

		if (
			!isset($data['school_id']) ||
			!isset($data['firstname']) ||
			!isset($data['lastname']) ||
			!isset($data['middlename']) ||
			!isset($data['email']) ||
			!isset($data['province']) ||
			!isset($data['city']) ||
			!isset($data['barangay']) ||
			!isset($data['gender']) ||
			!isset($data['LRN']) ||
			!isset($data['birthdate'])
		) {
			http_response_code(422);
			echo json_encode(['result' => 0, 'message' => 'incomplete data']);
			return;
		}
		$access_level = 1;

		// clean password
		$data['firstname'] = strtolower(str_replace(' ', '', $data['firstname']));
		$data['lastname'] = strtolower(str_replace(' ', '', $data['lastname']));

		// create new user
		$UserModel = new User();
		$password = $data['firstname'] . $data['lastname'];
		$user_id = $UserModel->create($password, $access_level);

		// create student
		$student_id = $this->StudentModel->create(
			$user_id,
			$data['school_id'],
			$data['firstname'],
			$data['lastname'],
			$data['middlename'],
			$data['email'],
			$data['province'],
			$data['city'],
			$data['barangay'],
			$data['gender'],
			$data['LRN'],
			$data['birthdate']
		);

		echo json_encode(['result' => 1, 'message' => 'student account created']);
	}
	public function update()
	{
		$data = (array) json_decode(file_get_contents('php://input'), true);
		if (
			!isset($data['id']) ||
			!isset($data['completed']) ||
			!isset($data['continuing']) ||
			!isset($data['firstname']) ||
			!isset($data['lastname']) ||
			!isset($data['middlename']) ||
			!isset($data['email']) ||
			!isset($data['province']) ||
			!isset($data['city']) ||
			!isset($data['barangay']) ||
			!isset($data['gender']) ||
			!isset($data['LRN']) ||
			!isset($data['birthdate'])
		) {
			http_response_code(422);
			echo json_encode(['result' => 0, 'message' => 'incomplete data']);
			return;
		}

		$this->StudentModel->update(
			$data['id'],
			$data['completed'],
			$data['continuing'],
			$data['firstname'],
			$data['lastname'],
			$data['middlename'],
			$data['email'],
			$data['province'],
			$data['city'],
			$data['barangay'],
			$data['gender'],
			$data['LRN'],
			$data['birthdate']
		);

		echo json_encode(['result' => 1, 'message' => 'student account updated']);
	}
}
