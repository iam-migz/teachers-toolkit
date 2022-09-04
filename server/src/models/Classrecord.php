<?php
namespace src\models;
use src\Database;
use PDO;

class Classrecord
{
	private PDO $conn;

	public function __construct()
	{
		$db = new Database;
		$this->conn = $db->getConnection();
	}

  public function create($subject_data_id, $quarter)
	{
		$query = "INSERT INTO classrecords
              SET 
                subject_data_id = :subject_data_id,
                quarter = :quarter";

		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':subject_data_id', $subject_data_id);
		$stmt->bindParam(':quarter', $quarter);
    return $stmt->execute();
	}

	public function update(
    $w1,$w2,$w3,$w4,$w5,$w6,$w7,$w8,$w9,$w10,
		$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,
		$q1,$id
  )
	{
		$query = <<<SQL
    UPDATE 
      classrecords 
    SET 
      w1 = :w1,   
      w2 = :w2,   
      w3 = :w3,   
      w4 = :w4,   
      w5 = :w5,   
      w6 = :w6,   
      w7 = :w7,   
      w8 = :w8,   
      w9 = :w9,   
      w10 = :w10,   
      p1 = :p1,   
      p2 = :p2,   
      p3 = :p3,   
      p4 = :p4,   
      p5 = :p5,   
      p6 = :p6,   
      p7 = :p7,   
      p8 = :p8,   
      p9 = :p9,   
      p10 = :p10,   
      q1 = :q1 
    WHERE 
      id = :id;
    SQL;
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':w1', $w1);
		$stmt->bindParam(':w2', $w2);
		$stmt->bindParam(':w3', $w3);
		$stmt->bindParam(':w4', $w4);
		$stmt->bindParam(':w5', $w5);
		$stmt->bindParam(':w6', $w6);
		$stmt->bindParam(':w7', $w7);
		$stmt->bindParam(':w8', $w8);
		$stmt->bindParam(':w9', $w9);
		$stmt->bindParam(':w10', $w10);

		$stmt->bindParam(':p1', $p1);
		$stmt->bindParam(':p2', $p2);
		$stmt->bindParam(':p3', $p3);
		$stmt->bindParam(':p4', $p4);
		$stmt->bindParam(':p5', $p5);
		$stmt->bindParam(':p6', $p6);
		$stmt->bindParam(':p7', $p7);
		$stmt->bindParam(':p8', $p8);
		$stmt->bindParam(':p9', $p9);
		$stmt->bindParam(':p10', $p10);

		$stmt->bindParam(':q1', $q1);
		$stmt->bindParam(':id', $id);

    return $stmt->execute();
	}

	// reads all grades of the student of a single subject
	public function findBySubjectAssignment($subject_assignment_id)
	{
		$query = <<<SQL
    SELECT 	
      CONCAT(stud.lastname, ', ', stud.middlename, ' ', stud.firstname) as student_name, stud.gender,
      cr.w1, cr.w2, cr.w4, cr.w3, cr.w5, cr.w6, cr.w7, cr.w8, cr.w9, cr.w10,
      cr.p1, cr.p2, cr.p4, cr.p3, cr.p5, cr.p6, cr.p7, cr.p8, cr.p9, cr.p10,
      cr.q1, cr.id as classrecord_id, cr.subject_data_id, cr.quarter, sd.subject_assignment_id
    FROM 	   
      subject_data sd, students stud, classrecords cr
    WHERE 	
      sd.subject_assignment_id = :subject_assignment_id
      AND sd.student_id = stud.id
      AND sd.id = cr.subject_data_id;
    SQL;

		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':subject_assignment_id', $subject_assignment_id);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// reads all the grades of each subjects of a single student
	public function findStudentGrades($student_id)
	{
		$query = <<<SQL
    SELECT 	
      sub.subject_name, sub.hours, sub.semester, subject_data.subject_assignment_id, 
      cr.quarter, sy.sy_start, sy.sy_end, sy.id as sy_id,
      cr.w1, cr.w2, cr.w4, cr.w3, cr.w5, cr.w6, cr.w7, cr.w8, cr.w9, cr.w10,
      cr.p1, cr.p2, cr.p4, cr.p3, cr.p5, cr.p6, cr.p7, cr.p8, cr.p9, cr.p10,
      cr.q1
    FROM 	
      students stud, 
      sections sec, 
      school_years sy,
      subjects sub, 
      subject_assignments, 
      student_assignments, 
      subject_data,
      classrecords cr
    WHERE 	
      stud.id = :student_id AND 
      stud.id = student_assignments.student_id AND 
      student_assignments.section_id = sec.id AND 
      sec.id = subject_assignments.section_id AND 
      sec.school_year_id = sy.id AND 
      sub.id = subject_assignments.subject_id AND 
      subject_data.subject_assignment_id = subject_assignments.id AND 
      subject_data.student_id = stud.id AND 
      subject_data.id = cr.subject_data_id;
    SQL;

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':student_id', $student_id);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

}