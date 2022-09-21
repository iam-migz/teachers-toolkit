<?php

namespace src\controllers;
use src\models\{SubjectAssignment, StudentAssignment, SubjectData, Classrecord, ClassrecordDetail};

class SubjectAssignController
{
	private SubjectAssignment $model;
	public function __construct()
	{
		$this->model = new SubjectAssignment();
	}

	public function create()
	{
		$data = (array) json_decode(file_get_contents('php://input'), true);

		if (!isset($data['section_id']) || !isset($data['subject_id']) || !isset($data['teacher_id'])) {
			http_response_code(422);
			echo json_encode(['result' => 0, 'message' => 'incomplete data']);
			return;
		}

		// create subject assignment
		$subjectassign_id = $this->model->create($data['section_id'], $data['subject_id'], $data['teacher_id']);

		if ($subjectassign_id !== false) {
			// read students by section
			$StudentAssign = new StudentAssignment();
			$students = $StudentAssign->findBySectionId($data['section_id']);
			if (count($students) === 0) {
				http_response_code(418);
				echo json_encode(['result' => 0, 'message' => 'there are no students']);
				return;
			}
			// create subject data & 2 classrecord, for each student
			$subjectdata = new SubjectData();
			$classrecord = new Classrecord();

			foreach ($students as $student) {
				$subjectdata->create($student['id'], $subjectassign_id);

				// quarter 1
				$classrecord->create($subjectdata->id, 1);
				// quarter 2
				$classrecord->create($subjectdata->id, 2);
			}

			// create classrecord detail for this subject_data
			$classrecordDetail = new ClassrecordDetail();
			$classrecordDetail->create($subjectassign_id, 1);
			$classrecordDetail->create($subjectassign_id, 2);
			echo json_encode(['result' => 1, 'message' => 'success subject assigned']);
		} else {
			http_response_code(418);
			echo json_encode([
				'result' => 0,
				'message' => 'failed to create subject assignment, check if subject is already assign to this section',
			]);
		}
	}

	public function findBySYID($id)
	{
		$result = $this->model->findBySYID($id);
		if ($result !== false) {
			echo json_encode(['result' => 1, 'data' => $result]);
			return;
		}
		http_response_code(404);
		echo json_encode(['result' => 0, 'message' => 'not found']);
	}

	public function findTeacherSubjects($id, $sy_id)
	{
		$result = $this->model->findTeacherSubjects($id, $sy_id);
		if ($result !== false) {
			echo json_encode(['result' => 1, 'data' => $result]);
			return;
		}
		http_response_code(404);
		echo json_encode(['result' => 0, 'message' => 'not found']);
	}
}
