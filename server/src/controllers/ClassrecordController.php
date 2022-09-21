<?php

namespace src\controllers;
use src\models\{Classrecord};

class ClassrecordController
{
	private Classrecord $model;
	public function __construct()
	{
		$this->model = new Classrecord();
	}

	public function update()
	{
		$data = (array) json_decode(file_get_contents('php://input'), true);
		// $w1,$w2,$w3,$w4,$w5,$w6,$w7,$w8,$w9,$w10,
		// $p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,
		// $q1,$id
		if (
			!isset($data['w1']) ||
			!isset($data['w2']) ||
			!isset($data['w3']) ||
			!isset($data['w4']) ||
			!isset($data['w5']) ||
			!isset($data['w6']) ||
			!isset($data['w7']) ||
			!isset($data['w8']) ||
			!isset($data['w9']) ||
			!isset($data['w10']) ||
			!isset($data['p1']) ||
			!isset($data['p2']) ||
			!isset($data['p3']) ||
			!isset($data['p4']) ||
			!isset($data['p5']) ||
			!isset($data['p6']) ||
			!isset($data['p7']) ||
			!isset($data['p8']) ||
			!isset($data['p9']) ||
			!isset($data['p10']) ||
			!isset($data['q1']) ||
			!isset($data['id'])
		) {
			http_response_code(422);
			echo json_encode(['result' => 0, 'message' => 'incomplete data']);
			return;
		}
		$this->model->update(
			$data['w1'],
			$data['w2'],
			$data['w3'],
			$data['w4'],
			$data['w5'],
			$data['w6'],
			$data['w7'],
			$data['w8'],
			$data['w9'],
			$data['w10'],
			$data['p1'],
			$data['p2'],
			$data['p3'],
			$data['p4'],
			$data['p5'],
			$data['p6'],
			$data['p7'],
			$data['p8'],
			$data['p9'],
			$data['p10'],
			$data['q1'],
			$data['id']
		);
		echo json_encode(['result' => 1, 'message' => 'class record updated']);
	}

	public function findBySubjectAssignment($id)
	{
		$result = $this->model->findBySubjectAssignment($id);
		if ($result !== false) {
			echo json_encode(['result' => 1, 'data' => $result]);
			return;
		}
		http_response_code(404);
		echo json_encode(['result' => 0, 'message' => 'not found']);
	}

	public function findStudentGrades($id)
	{
		$result = $this->model->findBySubjectAssignment($id);
		if ($result !== false) {
			echo json_encode(['result' => 1, 'data' => $result]);
			return;
		}
		http_response_code(404);
		echo json_encode(['result' => 0, 'message' => 'not found']);
	}
}
