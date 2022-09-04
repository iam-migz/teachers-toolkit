<?php
namespace src\models;
use src\Database;
use PDO;

class StudentAssignment
{
	private PDO $conn;

	public function __construct()
	{
		$db = new Database;
		$this->conn = $db->getConnection();
	}
  public function create($student_id, $section_id)
	{
		$query = <<<SQL
    INSERT INTO 
      student_assignments
    SET 
      student_id = :student_id,
      section_id = :section_id;
    SQL;

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':student_id', $student_id);
		$stmt->bindParam(':section_id', $section_id);

		return $stmt->execute();
	}

	public function findUnassignedStudents($SYID)
	{
		$query = <<<SQL
    SELECT    
      stud.id, CONCAT(stud.firstname,' ',stud.middlename,' ',stud.lastname) as name, stud.LRN
    FROM      
      students stud
    WHERE     
      stud.id NOT IN      
      (SELECT
        stud.id
        FROM 	  
          students stud, sections sec, student_assignments 
        WHERE 	  
          sec.school_year_id = :school_year_id AND 
          sec.id = student_assignments.section_id AND 
          stud.id = student_assignments.student_id);
    SQL;

		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':school_year_id', $SYID);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function findBySectionId($section_id)
	{
		$query = <<<SQL
    SELECT    
      stud.id, stud.user_id, stud.birthdate, sec.section_name, 
      sec.id as section_id, stud.school_id, stud.LRN, 
      CONCAT(stud.firstname, ' ', stud.middlename, ' ', stud.lastname) as student_name, 
      stud.email, stud.gender, 
      CONCAT(stud.barangay, ' ', stud.city, ' ', stud.province) as address
    FROM 	    
      student_assignments sa, sections sec, students stud                  
    WHERE 	
      sa.section_id = :section_id AND 
      sa.section_id = sec.id AND
      sa.student_id = stud.id;
    SQL;

		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':section_id', $section_id);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

}
