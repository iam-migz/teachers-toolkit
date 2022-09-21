<?php

namespace src\controllers;
use src\models\{School};

class SchoolController
{
	private School $SchoolModel;
	public function __construct()
	{
		$this->SchoolModel = new School();
	}

	public function create()
	{
		$data = (array) json_decode(file_get_contents('php://input'), true);

		if (
			!isset($data['barangay']) ||
			!isset($data['city']) ||
			!isset($data['province']) ||
			!isset($data['country']) ||
			!isset($data['postal_code']) ||
			!isset($data['principal_fn']) ||
			!isset($data['principal_ln']) ||
			!isset($data['principal_mn']) ||
			!isset($data['school_name'])
		) {
			http_response_code(422);
			echo json_encode(['result' => 0, 'message' => 'incomplete data']);
			return;
		}

		// create school
		$school_id = $this->SchoolModel->create(
			$data['barangay'],
			$data['city'],
			$data['province'],
			$data['country'],
			$data['postal_code'],
			$data['principal_fn'],
			$data['principal_ln'],
			$data['principal_mn'],
			$data['school_name']
		);

		echo json_encode(['result' => 1, 'school_id' => $school_id]);
	}

	public function update()
	{
		$data = (array) json_decode(file_get_contents('php://input'), true);

		if (
			!isset($data['barangay']) ||
			!isset($data['city']) ||
			!isset($data['province']) ||
			!isset($data['country']) ||
			!isset($data['postal_code']) ||
			!isset($data['principal_fn']) ||
			!isset($data['principal_ln']) ||
			!isset($data['principal_mn']) ||
			!isset($data['school_name']) ||
			!isset($data['id'])
		) {
			http_response_code(422);
			echo json_encode(['result' => 0, 'message' => 'incomplete data']);
			return;
		}

		$this->SchoolModel->update(
			$data['barangay'],
			$data['city'],
			$data['province'],
			$data['country'],
			$data['postal_code'],
			$data['principal_fn'],
			$data['principal_ln'],
			$data['principal_mn'],
			$data['school_name'],
			$data['id']
		);

		echo json_encode(['result' => 1, 'message' => 'school updated']);
	}

	public function findOne($id)
	{
		$result = $this->SchoolModel->findOne($id);
		if ($result !== false) {
			echo json_encode(['result' => 1, 'data' => $result]);
			return;
		}
		http_response_code(404);
		echo json_encode(['result' => 0, 'message' => 'not found']);
	}
}
