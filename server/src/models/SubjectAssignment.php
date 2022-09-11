<?php
namespace src\models;
use src\Database;
use PDO;

class SubjectAssignment
{
	private PDO $conn;

	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->getConnection();
	}
	public function create($section_id, $subject_id, $teacher_id): string|false
	{
		// check if already exists
		$query = "SELECT id FROM subject_assignments WHERE 
                section_id = :section_id AND 
                subject_id = :subject_id";

		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':section_id', $section_id);
		$stmt->bindParam(':subject_id', $subject_id);
		$stmt->execute();
		$duplicate = $stmt->fetch(PDO::FETCH_ASSOC);

		if (!$duplicate) {
			$query = "INSERT INTO subject_assignments 
                SET 
                  section_id = :section_id, 
                  subject_id = :subject_id,
                  teacher_id = :teacher_id";

			$stmt = $this->conn->prepare($query);

			$stmt->bindParam(':section_id', $section_id);
			$stmt->bindParam(':subject_id', $subject_id);
			$stmt->bindParam(':teacher_id', $teacher_id);

			$stmt->execute();
			return $this->conn->lastInsertId();
		}
		return false;
	}

	public function update($id, $section_id, $subject_id, $teacher_id)
	{
		$query = "UPDATE subject_assignments 
              SET 
                section_id = :section_id, 
                subject_id = :subject_id,
                teacher_id = :teacher_id
              WHERE 
                  id = :id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':section_id', $section_id);
		$stmt->bindParam(':subject_id', $subject_id);
		$stmt->bindParam(':teacher_id', $teacher_id);

		return $stmt->execute();
	}

	public function findBySYID($school_year_id)
	{
		$query = <<<SQL
SELECT 	
  sec.section_name, sec.grade,  sub.subject_name, 
  CONCAT(t.firstname,' ',t.lastname,' ',t.middlename) as teacher_name
FROM 	    
  subject_assignments sa, subjects sub, teachers t, sections sec
WHERE 	
  sa.section_id IN (SELECT id FROM sections WHERE sections.school_year_id = :school_year_id) AND 
  sub.id = sa.subject_id AND 
  t.id = sa.teacher_id AND
  sec.id = sa.section_id;
SQL;

		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':school_year_id', $school_year_id);

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function findTeacherSubjects($teacher_id, $school_year_id)
	{
		$query = <<<SQL
SELECT    
  sa.id, sub.id as subject_id, sub.subject_name, sub.semester, 
  sub.hours, sec.section_name, sec.id as section_id, sec.strand, sec.track, sec.grade
FROM      
  subject_assignments sa, subjects sub, sections sec
WHERE     
  sa.subject_id IN 
    (SELECT id FROM subjects sub WHERE sub.school_year_id = :school_year_id)
  AND sa.teacher_id = :teacher_id
  AND sa.section_id = sec.id
  AND sa.subject_id = sub.id;
SQL;

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':teacher_id', $teacher_id);
		$stmt->bindParam(':school_year_id', $school_year_id);

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}
