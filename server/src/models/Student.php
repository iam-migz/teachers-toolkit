<?php
namespace src\models;
use src\Database;
use PDO;

class Student
{
	private PDO $conn;

	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->getConnection();
	}

	public function create(
		$user_id,
		$school_id,
		$firstname,
		$lastname,
		$middlename,
		$email,
		$province,
		$city,
		$barangay,
		$gender,
		$LRN,
		$birthdate
	): string|false {
		$query = <<<SQL
INSERT INTO 
  students 
SET 
  user_id = :user_id, 
  firstname = :firstname,
  lastname = :lastname,
  school_id = :school_id,
  middlename = :middlename,
  email = :email,
  province = :province,
  city = :city,
  barangay = :barangay,
  gender = :gender,
  LRN = :LRN,
  birthdate = :birthdate;    
SQL;

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':user_id', $user_id);
		$stmt->bindParam(':school_id', $school_id);
		$stmt->bindParam(':firstname', $firstname);
		$stmt->bindParam(':lastname', $lastname);
		$stmt->bindParam(':middlename', $middlename);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':province', $province);
		$stmt->bindParam(':city', $city);
		$stmt->bindParam(':barangay', $barangay);
		$stmt->bindParam(':gender', $gender);
		$stmt->bindParam(':LRN', $LRN);
		$stmt->bindParam(':birthdate', $birthdate);

		$stmt->execute();
		return $this->conn->lastInsertId();
	}
	public function findOne($id)
	{
		$query = 'SELECT * FROM students WHERE id = :id LIMIT 0,1;';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	public function findByUserId($user_id)
	{
		$query = 'SELECT * FROM students WHERE user_id = :user_id LIMIT 0,1;';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	public function findBySchoolId($school_id)
	{
		$query = <<<SQL
SELECT 
  * 
FROM 
  students 
WHERE 
  school_id = :school_id AND
  continuing = 1 AND 
  completed = 0
SQL;

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':school_id', $school_id);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function update(
		$id,
		$completed,
		$continuing,
		$firstname,
		$lastname,
		$middlename,
		$email,
		$province,
		$city,
		$barangay,
		$gender,
		$LRN,
		$birthdate
	): bool {
		$query = <<<SQL
UPDATE 
  students 
SET 
  completed = :completed,
  continuing = :continuing,
  firstname = :firstname,
  lastname = :lastname,
  middlename = :middlename,
  email = :email,
  province = :province,
  city = :city,
  barangay = :barangay,
  gender = :gender,
  LRN = :LRN,
  birthdate = :birthdate
WHERE
  id = :id;
SQL;

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':completed', $completed);
		$stmt->bindParam(':continuing', $continuing);
		$stmt->bindParam(':firstname', $firstname);
		$stmt->bindParam(':lastname', $lastname);
		$stmt->bindParam(':middlename', $middlename);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':province', $province);
		$stmt->bindParam(':city', $city);
		$stmt->bindParam(':barangay', $barangay);
		$stmt->bindParam(':gender', $gender);
		$stmt->bindParam(':LRN', $LRN);
		$stmt->bindParam(':birthdate', $birthdate);

		return $stmt->execute();
	}
}
