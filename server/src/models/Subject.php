<?php
namespace src\models;
use src\Database;
use PDO;

class Subject
{
	private PDO $conn;

	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->getConnection();
	}

	public function create($school_year_id, $subject_name, $semester, $hours): bool
	{
		$query = <<<SQL
INSERT INTO 
	subjects 
SET 
	school_year_id = :school_year_id, 
	subject_name = :subject_name, 
	semester = :semester,
	hours = :hours;
SQL;

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':school_year_id', $school_year_id);
		$stmt->bindParam(':subject_name', $subject_name);
		$stmt->bindParam(':semester', $semester);
		$stmt->bindParam(':hours', $hours);

		return $stmt->execute();
	}

	public function update($subject_name, $semester, $hours, $id): bool
	{
		$query = <<<SQL
UPDATE 
	subjects 
SET 
	subject_name = :subject_name,
	semester = :semester,
	hours = :hours
WHERE 
	id = :id;
SQL;

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':subject_name', $subject_name);
		$stmt->bindParam(':semester', $semester);
		$stmt->bindParam(':hours', $hours);
		$stmt->bindParam(':id', $id);

		return $stmt->execute();
	}

	public function findBySchoolYearId($school_year_id): array|false
	{
		$query = 'SELECT * FROM subjects WHERE school_year_id = :school_year_id';
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':school_year_id', $school_year_id);

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function findById($id): array|false
	{
		$query = 'SELECT * FROM subjects WHERE id = :id LIMIT 0, 1';
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':id', $id);

		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function findBySectionId($section_id): array|false
	{
		$query = <<<SQL
SELECT 	
	*
FROM 	    
	subjects sub
WHERE 	
	sub.id IN 
	(SELECT sa.subject_id FROM subject_assignments sa WHERE sa.section_id = :section_id);
SQL;

		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':section_id', $section_id);

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}
