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

	public function login(): void
	{
		// get json data
		$data = (array) json_decode(file_get_contents('php://input'), true);

		if (!isset($data['id']) || !isset($data['password'])) {
			http_response_code(422);
			echo json_encode(['result' => 0, 'message' => 'incomplete data']);
			return;
		}
		$access = $this->UserModel->login($data['id'], $data['password']);
		if ($access >= 1) {
			// fetch user account
			if ($access == 1) {
				$account = new Student();
			} elseif ($access == 2) {
				$account = new Teacher();
			} elseif ($access == 3) {
				$account = new Admin();
			}
			$account_data = $account->findByUserId($data['id']);

			session_start();
			$_SESSION['user_id'] = $account_data['user_id'];
			$_SESSION['account_id'] = $account_data['id'];
			$_SESSION['school_id'] = $account_data['school_id'];
			$_SESSION['access'] = $access;

			echo json_encode(['result' => $access, 'message' => 'logged in']);
		} else {
			http_response_code(401);
			if ($access === -1) {
				echo json_encode(['result' => 0, 'message' => 'id not found']);
			} elseif ($access === 0) {
				echo json_encode(['result' => 0, 'message' => 'incorrect password']);
			} else {
				echo json_encode(['result' => 0, 'message' => 'something went wrong']);
			}
		}
	}
	public function create(string $password, string $access): bool
	{
		if (!empty($password) && !empty($access)) {
			$this->UserModel->create($password, $access);
			return true;
		}
		return false;
	}

  
  public function changePass()
  {
		$data = (array) json_decode(file_get_contents('php://input'), true);

		if (!isset($data['id']) || !isset($data['old_pass']) || !isset($data['new_pass'])) {
			http_response_code(422);
			echo json_encode(['result' => 0, 'message' => 'incomplete data']);
			return;
		}

    switch($this->UserModel->changePass($data['id'], $data['old_pass'], $data['new_pass'])){
      case -1:
        http_response_code(404);
        echo json_encode(['result' => 0, 'message' => 'cannot find user']);
        break;
      case 0:
        http_response_code(401);
        echo json_encode(['result' => 0, 'message' => 'incorrect password']);
        break;
      case 1:
        echo json_encode(['result' => 1, 'message' => 'changed password']);
        break;
      default:
        http_response_code(500);
        echo json_encode(['result' => 0, 'message' => 'something went wrong']);
    }
  }

}
