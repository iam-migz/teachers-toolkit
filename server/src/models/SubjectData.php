<?php
namespace src\models;
use src\Database;
use PDO;

class SubjectData
{
	private PDO $conn;
	public $id;
	public function __construct()
	{
		$db = new Database;
		$this->conn = $db->getConnection();
	}

  public function create($student_id, $subject_assignment_id)
	{
		$query = "INSERT INTO subject_data 
              SET 
                student_id = :student_id, 
                subject_assignment_id = :subject_assignment_id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':student_id', $student_id);
		$stmt->bindParam(':subject_assignment_id', $subject_assignment_id);

		$stmt->execute();
		$this->id = $this->conn->lastInsertId();
		return true;
	}
}
