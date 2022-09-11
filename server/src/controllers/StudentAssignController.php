<?php

namespace src\controllers;
use src\models\{StudentAssignment};

class StudentAssignController
{
	private StudentAssignment $StudentAssignmentModel;
	public function __construct()
	{
		$this->StudentAssignmentModel = new StudentAssignment();
	}

	public function create()
	{
		$data = (array) json_decode(file_get_contents('php://input'), true);
		if (!isset($data['student_id']) || !isset($data['section_id'])) {
			http_response_code(422);
			echo json_encode(['result' => 0, 'message' => 'incomplete data']);
			return;
		}
		$this->StudentAssignmentModel->create($data['student_id'], $data['section_id']);
		echo json_encode(['result' => 1, 'message' => 'section created']);
	}

	public function findUnassignedStudents($id)
	{
		$result = $this->StudentAssignmentModel->findUnassignedStudents($id);
		if ($result !== false) {
			echo json_encode(['result' => 1, 'data' => $result]);
			return;
		}
		http_response_code(404);
		echo json_encode(['result' => 0, 'message' => 'not found']);
	}
	public function findBySectionId($id)
	{
		$result = $this->StudentAssignmentModel->findBySectionId($id);
		if ($result !== false) {
			echo json_encode(['result' => 1, 'data' => $result]);
			return;
		}
		http_response_code(404);
		echo json_encode(['result' => 0, 'message' => 'not found']);
	}
}
