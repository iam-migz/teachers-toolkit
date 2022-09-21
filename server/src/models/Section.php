<?php
namespace src\models;
use src\Database;
use PDO;

class Section
{
	private PDO $conn;

	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->getConnection();
	}
	public function create($school_year_id, $advisor_id, $section_name, $strand, $track, $grade): bool
	{
		$query = <<<SQL
INSERT INTO 
	sections 
SET 
	school_year_id = :school_year_id,
	advisor_id = :advisor_id,
	section_name = :section_name, 
	strand = :strand,
	track = :track,
	grade = :grade;
SQL;

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':school_year_id', $school_year_id);
		$stmt->bindParam(':advisor_id', $advisor_id);
		$stmt->bindParam(':section_name', $section_name);
		$stmt->bindParam(':strand', $strand);
		$stmt->bindParam(':track', $track);
		$stmt->bindParam(':grade', $grade);

		return $stmt->execute();
	}

	public function update($section_name, $strand, $track, $grade, $id, $advisor_id)
	{
		$query = <<<SQL
UPDATE 
	sections 
SET 
	advisor_id = :advisor_id, 
	section_name = :section_name, 
	strand = :strand,
	track = :track,
	grade = :grade
WHERE 
	id = :id;
SQL;

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':section_name', $section_name);
		$stmt->bindParam(':strand', $strand);
		$stmt->bindParam(':track', $track);
		$stmt->bindParam(':grade', $grade);
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':advisor_id', $advisor_id);

		return $stmt->execute();
	}

	public function findBySYID($school_year_id)
	{
		$query = 'SELECT * FROM sections WHERE school_year_id = :school_year_id';
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':school_year_id', $school_year_id);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function findById($id)
	{
		$query = 'SELECT * FROM sections WHERE id = :id';
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function findByAdvisorIdAndSYID($advisor_id, $school_year_id)
	{
		$query = <<<SQL
SELECT 	
	*
FROM 	
	sections sec
WHERE 	
	sec.advisor_id = (SELECT id FROM teachers WHERE id = :advisor_id) AND
	sec.school_year_id = :school_year_id;
SQL;

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':advisor_id', $advisor_id);
		$stmt->bindParam(':school_year_id', $school_year_id);

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}
