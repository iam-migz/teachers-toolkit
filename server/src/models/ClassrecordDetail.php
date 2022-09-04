<?php
namespace src\models;
use src\Database;
use PDO;

class ClassrecordDetail
{
	private PDO $conn;

	public function __construct()
	{
		$db = new Database;
		$this->conn = $db->getConnection();
	}

  public function create($subject_assignment_id, $quarter)
	{
		$query = "INSERT INTO classrecord_details
              SET 
                subject_assignment_id = :subject_assignment_id,
                quarter = :quarter";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':subject_assignment_id', $subject_assignment_id);
		$stmt->bindParam(':quarter', $quarter);

		return $stmt->execute();
	}

	public function update(
    $written_weight, $performance_weight, $quarterly_weight,
		$hw1,$hw2,$hw3,$hw4,$hw5,$hw6,$hw7,$hw8,$hw9,$hw10,
		$hp1,$hp2,$hp3,$hp4,$hp5,$hp6,$hp7,$hp8,$hp9,$hp10,
		$hq1,$id
  )
	{
		$query = <<<SQL
    UPDATE 
      classrecord_details 
    SET 
      written_weight = :written_weight,
      performance_weight = :performance_weight,
      quarterly_weight = :quarterly_weight,
      hw1 = :hw1,   
      hw2 = :hw2,   
      hw3 = :hw3,   
      hw4 = :hw4,   
      hw5 = :hw5,   
      hw6 = :hw6,   
      hw7 = :hw7,   
      hw8 = :hw8,   
      hw9 = :hw9,   
      hw10 = :hw10,   
      hp1 = :hp1,   
      hp2 = :hp2,   
      hp3 = :hp3,   
      hp4 = :hp4,   
      hp5 = :hp5,   
      hp6 = :hp6,   
      hp7 = :hp7,   
      hp8 = :hp8,   
      hp9 = :hp9,   
      hp10 = :hp10,   
      hq1 = :hq1
    WHERE 
      id = :id;
    SQL;
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':written_weight', $written_weight);
		$stmt->bindParam(':performance_weight', $performance_weight);
		$stmt->bindParam(':quarterly_weight', $quarterly_weight);

		$stmt->bindParam(':hw1', $hw1);
		$stmt->bindParam(':hw2', $hw2);
		$stmt->bindParam(':hw3', $hw3);
		$stmt->bindParam(':hw4', $hw4);
		$stmt->bindParam(':hw5', $hw5);
		$stmt->bindParam(':hw6', $hw6);
		$stmt->bindParam(':hw7', $hw7);
		$stmt->bindParam(':hw8', $hw8);
		$stmt->bindParam(':hw9', $hw9);
		$stmt->bindParam(':hw10', $hw10);

		$stmt->bindParam(':hp1', $hp1);
		$stmt->bindParam(':hp2', $hp2);
		$stmt->bindParam(':hp3', $hp3);
		$stmt->bindParam(':hp4', $hp4);
		$stmt->bindParam(':hp5', $hp5);
		$stmt->bindParam(':hp6', $hp6);
		$stmt->bindParam(':hp7', $hp7);
		$stmt->bindParam(':hp8', $hp8);
		$stmt->bindParam(':hp9', $hp9);
		$stmt->bindParam(':hp10', $hp10);

		$stmt->bindParam(':hq1', $hq1);
		$stmt->bindParam(':id', $id);

		return $stmt->execute();
	}

	public function findBySubjectAssignment($subject_assignment_id, $quarter)
	{
		$query = <<<SQL
    SELECT 	
      crd.written_weight, crd.performance_weight, crd.quarterly_weight, crd.id,
      hw1, hw2, hw3, hw4, hw5, hw6, hw7, hw8, hw9, hw10, 
      hp1, hp2, hp3, hp4, hp5, hp6, hp7, hp8, hp9, hp10, hq1
    FROM 	    
      classrecord_details crd	
    WHERE 	
      crd.subject_assignment_id = :subject_assignment_id AND
      crd.quarter = :quarter
    LIMIT     
      0,1;
    SQL;

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':subject_assignment_id', $subject_assignment_id);
		$stmt->bindParam(':quarter', $quarter);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}
