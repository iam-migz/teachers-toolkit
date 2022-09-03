<?php
namespace src\models;
use src\Database;
use PDO;

class SchoolYear extends Database
{
	private PDO $conn;

	public function __construct()
	{
		$db = new Database;
		$this->conn = $db->getConnection();
	}


	public function create(int $school_id, string $sy_start, string $sy_end) : string|false
	{
		$query = "INSERT INTO school_years 
							SET 
								school_id = :school_id, 
								sy_start = :sy_start,
								sy_end = :sy_end";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':school_id', $school_id);
		$stmt->bindParam(':sy_start', $sy_start);
		$stmt->bindParam(':sy_end', $sy_end);

		$stmt->execute();
		return $this->conn->lastInsertId();
	}
	
	public function findOne(int $id) : array | false
	{
		$query = 'SELECT * FROM school_years WHERE id = :id LIMIT 0, 1';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public function findAll(int $school_id) : array | false
	{;
		$query = 'SELECT * FROM school_years WHERE school_id = :school_id';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':school_id', $school_id);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

}
