<?php

namespace src\controllers;
use src\models\{User, Admin, Teacher, Student};

class UserController
{
	private User $UserModel;
	public function __construct()
	{
		$this->UserModel = new User();
	}

	public function funBee()
	{
		echo json_encode(['test' => 'ok']);
	}

	public function login() : void
	{
		// get json data
    $data = (array) json_decode(file_get_contents("php://input"), true);

		if ( !isset($data['id']) || !isset($data['password']) ){
			http_response_code(422);
			echo json_encode( array("result" => 0, "message" => "incomplete data") );
			return;
		}

		if ($access = $this->UserModel->login($data['id'], $data['password'])) {
			// fetch user account
			if ($access == 1) {
				$account = new Student();
			} elseif ($access == 2) {
				$account = new Teacher();
			} elseif ($access == 3) {
				$account = new Admin();
			}
			$account_data = $account->findOne($data['id']);

			// session_start();
			// $_SESSION['user_id'] = $account_data['id'];
			// $_SESSION['account_id'] = $account_data['account_id'];
			// $_SESSION['school_id'] = $account_data['school_id'];
			// $_SESSION['access'] = $account_data['access'];

			echo json_encode(['result' => 1, 'message' => 'logged in']);
		} else {
			http_response_code(401);
			echo json_encode(['result' => 0, 'message' => 'incorrect login credentials']);			
		}
	}
	public function create(string $password, string $access) : bool
	{
		if (!empty($password) && !empty($access)) {
			$this->UserModel->create($password, $access);
			return true;
		}
		return false;
	}

	public function read()
	{
	}
}
