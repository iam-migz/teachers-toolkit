<?php

namespace src\controllers;
use src\models\{Subject};

class SubjectController
{
	private Subject $SubjectModel;
	public function __construct()
	{
		$this->SubjectModel = new Subject();
	}

	public function create()
	{
		$data = (array) json_decode(file_get_contents('php://input'), true);
		if (
			!isset($data['school_year_id']) ||
			!isset($data['subject_name']) ||
			!isset($data['semester']) ||
			!isset($data['hours'])
		) {
			http_response_code(422);
			echo json_encode(['result' => 0, 'message' => 'incomplete data']);
			return;
		}
		$this->SubjectModel->create($data['school_year_id'], $data['subject_name'], $data['semester'], $data['hours']);
		echo json_encode(['result' => 1, 'message' => 'subject created']);
	}
	public function update()
	{
		$data = (array) json_decode(file_get_contents('php://input'), true);
		if (!isset($data['subject_name']) || !isset($data['semester']) || !isset($data['hours']) || !isset($data['id'])) {
			http_response_code(422);
			echo json_encode(['result' => 0, 'message' => 'incomplete data']);
			return;
		}
		$this->SubjectModel->create($data['subject_name'], $data['semester'], $data['hours'], $data['id']);
		echo json_encode(['result' => 1, 'message' => 'subject updated']);
	}
	public function findBySchoolYearId($id)
	{
		$result = $this->SubjectModel->findBySchoolYearId($id);
		if ($result !== false) {
			echo json_encode(['result' => 1, 'data' => $result]);
			return;
		}
		http_response_code(404);
		echo json_encode(['result' => 0, 'message' => 'not found']);
	}
	public function findById($id)
	{
		$result = $this->SubjectModel->findById($id);
		if ($result !== false) {
			echo json_encode(['result' => 1, 'data' => $result]);
			return;
		}
		http_response_code(404);
		echo json_encode(['result' => 0, 'message' => 'not found']);
	}
	public function findBySectionId($id)
	{
		$result = $this->SubjectModel->findBySectionId($id);
		if ($result !== false) {
			echo json_encode(['result' => 1, 'data' => $result]);
			return;
		}
		http_response_code(404);
		echo json_encode(['result' => 0, 'message' => 'not found']);
	}
}
