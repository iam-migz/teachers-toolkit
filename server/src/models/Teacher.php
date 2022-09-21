<?php
namespace src\models;
use src\Database;
use PDO;

class Teacher
{
	private PDO $conn;

	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->getConnection();
	}

	public function findByUserId(string $user_id): array|false
	{
		$query = 'SELECT * FROM teachers WHERE user_id = :user_id LIMIT 0, 1';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function create($user_id, $school_id, $firstname, $lastname, $middlename, $phone_no, $email): string|false
	{
		$query = <<<SQL
    INSERT INTO 
      teachers 
    SET 
      user_id = :user_id, 
      school_id = :school_id, 
      firstname = :firstname,
      lastname = :lastname,
      middlename = :middlename,
      phone_no = :phone_no,
      email = :email;
    SQL;

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':user_id', $user_id);
		$stmt->bindParam(':school_id', $school_id);
		$stmt->bindParam(':firstname', $firstname);
		$stmt->bindParam(':lastname', $lastname);
		$stmt->bindParam(':middlename', $middlename);
		$stmt->bindParam(':phone_no', $phone_no);
		$stmt->bindParam(':email', $email);

		$stmt->execute();
		return $this->conn->lastInsertId();
	}

	public function findBySchoolId($school_id)
	{
		$query = 'SELECT * FROM teachers WHERE school_id = :school_id AND continuing = 1';
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':school_id', $school_id);

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function findOne($id)
	{
		$query = 'SELECT * FROM teachers WHERE id = :id LIMIT 0,1';
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':id', $id);

		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function update($id, $continuing, $firstname, $lastname, $middlename, $phone_no, $email): bool
	{
		$query = <<<SQL
    UPDATE teachers 
    SET 
      continuing = :continuing,
      firstname = :firstname,
      lastname = :lastname,
      middlename = :middlename,
      phone_no = :phone_no,
      email = :email
    WHERE 
      id = :id;
    SQL;

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':continuing', $continuing);
		$stmt->bindParam(':firstname', $firstname);
		$stmt->bindParam(':lastname', $lastname);
		$stmt->bindParam(':middlename', $middlename);
		$stmt->bindParam(':phone_no', $phone_no);
		$stmt->bindParam(':email', $email);

		return $stmt->execute();
	}
}
