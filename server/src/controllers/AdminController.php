<?php

namespace src\controllers;
use src\models\{User, Admin, Teacher, Student};

class AdminController
{
	private Admin $AdminModel;
	public function __construct()
	{
		$this->AdminModel = new Admin();
	}

  public function create() 
  {
    $data = (array) json_decode(file_get_contents("php://input"), true);

    if ( 
      !isset($data['school_id']) ||
      !isset($data['password']) ||
      !isset($data['firstname']) ||
      !isset($data['lastname']) ||
      !isset($data['middlename']) ||
      !isset($data['phone_no']) ||
      !isset($data['email'])
    ){
      http_response_code(422);
      echo json_encode(["result" => 0, "message" => "incomplete data"]);
      return;
    }
    $access_level = 3;

    // create new user
    $UserModel = new User();
    $user_id = $UserModel->create($data['password'], $access_level);

    // create admin
    $admin_id = $this->AdminModel->create(
      $user_id, 
      $data['school_id'], 
      $data['firstname'], 
      $data['lastname'],
      $data['middlename'],
      $data['phone_no'],
      $data['email']
    );

    // log user in
    session_start();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['school_id'] = $data['school_id'];
    $_SESSION['account_id'] = $admin_id;
    $_SESSION['access'] = $access_level;

    echo json_encode(["result" => 1, "message" => "admin account created"]);

  }
}
