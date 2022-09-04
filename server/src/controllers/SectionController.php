<?php

namespace src\controllers;
use src\models\{Section};

class SectionController
{
	private Section $SectionModel;
	public function __construct()
	{
		$this->SectionModel = new Section();
	}

	public function create()
	{
		$data = (array) json_decode(file_get_contents("php://input"), true);
    if ( 
			!isset($data['school_year_id']) ||
			!isset($data['advisor_id']) ||
			!isset($data['section_name']) ||
			!isset($data['strand']) ||
			!isset($data['track']) ||
			!isset($data['grade']) 
    ){
      http_response_code(422);
      echo json_encode(["result" => 0, "message" => "incomplete data"]);
      return;
    }
    $this->SectionModel->create(
			$data['school_year_id'],
			$data['advisor_id'],
			$data['section_name'],
			$data['strand'],
			$data['track'],
			$data['grade']
    );
    echo json_encode(["result" => 1, "message" => "section created"]);
	}
	public function update()
	{
		$data = (array) json_decode(file_get_contents("php://input"), true);
    if ( 
			!isset($data['section_name']) ||
			!isset($data['strand']) ||
			!isset($data['track']) ||
			!isset($data['grade']) ||
			!isset($data['id']) ||
			!isset($data['advisor_id']) 
    ){
      http_response_code(422);
      echo json_encode(["result" => 0, "message" => "incomplete data"]);
      return;
    }
    $this->SectionModel->create(
			$data['section_name'],
			$data['strand'],
			$data['track'],
			$data['grade'],
			$data['id'],
			$data['advisor_id']
    );
    echo json_encode(["result" => 1, "message" => "section update"]);
	}
	public function findById($id)
	{
		$result = $this->SectionModel->findById($id);
    if ($result !== false) {
      echo json_encode(["result" => 1, "data" => $result]);
      return;
    }
    http_response_code(404);
    echo json_encode(["result" => 0, "message" => "not found"]);
	}
	public function findBySYID($id)
	{
		$result = $this->SectionModel->findBySYID($id);
    if ($result !== false) {
      echo json_encode(["result" => 1, "data" => $result]);
      return;
    }
    http_response_code(404);
    echo json_encode(["result" => 0, "message" => "not found"]);
	}
	public function findByAdvisorIdAndSYID($id, $sy_id)
	{
		$result = $this->SectionModel->findByAdvisorIdAndSYID($id, $sy_id);
    if ($result !== false) {
      echo json_encode(["result" => 1, "data" => $result]);
      return;
    }
    http_response_code(404);
    echo json_encode(["result" => 0, "message" => "not found"]);
	}
}
