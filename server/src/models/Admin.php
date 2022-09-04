<?php
namespace src\models;
use src\Database;
use PDO;

class Admin
{
	private PDO $conn;

	public function __construct()
	{
		$db = new Database;
		$this->conn = $db->getConnection();
	}


  public function findOne($id) : array | false
  {
    $query = 'SELECT * FROM admins WHERE id = :id LIMIT 0,1';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  public function findByUserId($user_id) : array | false
  {
    $query = 'SELECT * FROM admins WHERE user_id = :user_id LIMIT 0,1';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function create(
    string $user_id, 
    string $school_id,
    string $firstname,
    string $lastname,
    string $middlename,
    string $phone_no,
    string $email,
    ) : string|false
  {
    $query = "INSERT INTO 
                admins 
              SET 
                user_id = :user_id, 
                school_id = :school_id,
                firstname = :firstname,
                lastname = :lastname,
                middlename = :middlename,
                phone_no = :phone_no,
                email = :email";

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
}
