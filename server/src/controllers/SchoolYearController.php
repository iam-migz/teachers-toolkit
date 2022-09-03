<?php

namespace src\controllers;
use src\models\{SchoolYear};

class SchoolYearController
{
	private SchoolYear $SchoolYearModel;
	public function __construct()
	{
		$this->SchoolYearModel = new SchoolYear();
	}

  public function create() 
  {
		$data = (array) json_decode(file_get_contents("php://input"), true);
    if ( 
      !isset($data['school_id']) ||
      !isset($data['sy_start']) ||
      !isset($data['sy_end'])
    ){
      http_response_code(422);
      echo json_encode(["result" => 0, "message" => "incomplete data"]);
      return;
    }
    $this->SchoolYearModel->create(
      $data['school_id'],
      $data['sy_start'],
      $data['sy_end']
    );
    echo json_encode(["result" => 1, "message" => "school year created"]);
  }

  public function findOne(string $id) 
  {
    $result = $this->SchoolYearModel->findOne((int)$id);
    if ($result !== false) {
      echo json_encode(["result" => 1, "data" => $result]);
      return;
    }
    http_response_code(404);
    echo json_encode(["result" => 0, "message" => "not found"]);
  }

  public function findAll(string $id)
  {
    $result = $this->SchoolYearModel->findAll((int)$id);
    if ($result !== false) {
      echo json_encode(["result" => 1, "data" => $result]);
      return;
    }
    http_response_code(404);
    echo json_encode(["result" => 0, "message" => "not found"]);
  }

}
