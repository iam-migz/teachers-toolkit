<?php
namespace src\models;
use src\Database;
use PDO;
class Student extends Database
{
	private PDO $conn;

	public function __construct()
	{
		$db = new Database;
		$this->conn = $db->getConnection();
	}


  public function findOne(string $user_id) : array | false
  {
    $query = 'SELECT * FROM students WHERE user_id = :user_id LIMIT 0, 1';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

}
