<?php

namespace src\controllers;
use src\models\{User, Teacher};

class TeacherController
{
	private Teacher $TeacherModel;
	public function __construct()
	{
		$this->TeacherModel = new Teacher();
	}

  public function findOne($id)
  {
    $result = $this->TeacherModel->findOne((int)$id);
    if ($result !== false) {
      echo json_encode(["result" => 1, "data" => $result]);
      return;
    }
    http_response_code(404);
    echo json_encode(["result" => 0, "message" => "not found"]);
  }
  public function findBySchoolId($id)
  {
    $result = $this->TeacherModel->findBySchoolId((int)$id);
    if ($result !== false) {
      echo json_encode(["result" => 1, "data" => $result]);
      return;
    }
    http_response_code(404);
    echo json_encode(["result" => 0, "message" => "not found"]);
  }

  public function create() 
  {
    $data = (array) json_decode(file_get_contents("php://input"), true);

    if ( 
      !isset($data['school_id']) ||
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
    $access_level = 2;

    // clean password
    $data['firstname'] = strtolower(str_replace(' ', '', $data['firstname']));
    $data['lastname'] = strtolower(str_replace(' ', '', $data['lastname']));

    // create new user
    $UserModel = new User();
    $password = $data['firstname'].$data['lastname'];
    $user_id = $UserModel->create($password, $access_level);

    // create student
    $this->TeacherModel->create(
      $user_id, 
      $data['school_id'],
      $data['firstname'],
      $data['lastname'],
      $data['middlename'],
      $data['phone_no'],
      $data['email']
    );
    echo json_encode(["result" => 1, "message" => "teacher account created"]);
  }
  public function update() 
  {
    $data = (array) json_decode(file_get_contents("php://input"), true);
    if ( 
      !isset($data['id']) ||
      !isset($data['continuing']) ||
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

    $this->TeacherModel->update(
      $data['id'],
      $data['continuing'],
      $data['firstname'],
      $data['lastname'],
      $data['middlename'],
      $data['phone_no'],
      $data['email']
    );

    echo json_encode(["result" => 1, "message" => "teacher account updated"]);
  }

}
