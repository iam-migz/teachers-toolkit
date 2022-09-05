<?php

namespace src\controllers;
use src\models\{ClassrecordDetail};

class ClassrecordDetailController
{
	private ClassrecordDetail $model;
	public function __construct()
	{
		$this->model = new ClassrecordDetail();
	}
  
  public function update()
  {
		$data = (array) json_decode(file_get_contents("php://input"), true);

    if ( 
      !isset($data['written_weight']) ||
      !isset($data['performance_weight']) ||
      !isset($data['quarterly_weight']) ||
      !isset($data['hw1']) ||
      !isset($data['hw2']) ||
      !isset($data['hw3']) ||
      !isset($data['hw4']) ||
      !isset($data['hw5']) ||
      !isset($data['hw6']) ||
      !isset($data['hw7']) ||
      !isset($data['hw8']) ||
      !isset($data['hw9']) ||
      !isset($data['hw10']) ||
      !isset($data['hp1']) ||
      !isset($data['hp2']) ||
      !isset($data['hp3']) ||
      !isset($data['hp4']) ||
      !isset($data['hp5']) ||
      !isset($data['hp6']) ||
      !isset($data['hp7']) ||
      !isset($data['hp8']) ||
      !isset($data['hp9']) ||
      !isset($data['hp10']) ||
      !isset($data['hq1']) ||
      !isset($data['id'])
    ){
      http_response_code(422);
      echo json_encode(["result" => 0, "message" => "incomplete data"]);
      return;
    }
    $this->model->update(
      $data['written_weight'],
      $data['performance_weight'],
      $data['quarterly_weight'],
      $data['hw1'],
      $data['hw2'],
      $data['hw3'],
      $data['hw4'],
      $data['hw5'],
      $data['hw6'],
      $data['hw7'],
      $data['hw8'],
      $data['hw9'],
      $data['hw10'],
      $data['hp1'],
      $data['hp2'],
      $data['hp3'],
      $data['hp4'],
      $data['hp5'],
      $data['hp6'],
      $data['hp7'],
      $data['hp8'],
      $data['hp9'],
      $data['hp10'],
      $data['hq1'],
      $data['id']
    );
    echo json_encode(["result" => 1, "message" => "class record detail updated"]);
  }

  public function findBySubjectAssignment($id, $quarter)
  {
    $result = $this->model->findBySubjectAssignment($id, $quarter);
    if ($result !== false) {
      echo json_encode(["result" => 1, "data" => $result]);
      return;
    }
    http_response_code(404);
    echo json_encode(["result" => 0, "message" => "not found"]);
  }

}
