<?php
namespace src\models;
use src\Database;
use PDO;
class User extends Database
{
	// database
	private PDO $conn;

	// User Properties
	public $id;
	public $username;
	public $password;
	public $access;

	// for login
	public $account_id;
	public $school_id;

	public function __construct()
	{
		$db = new Database;
		$this->conn = $db->getConnection();
	}

	public function create(string $password, string $access) : string|false
	{
		$query = 'INSERT INTO users SET password = :password, access = :access';
		$stmt = $this->conn->prepare($query);

		$password = password_hash($password, PASSWORD_DEFAULT);

		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':access', $access);

		$stmt->execute();
		return $this->conn->lastInsertId();
	}

	public function login(string $id, string $password) : int | false
	{
		$query = 'SELECT * FROM users WHERE id = :id LIMIT 0, 1';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$access = $row['access'];
		$hashed_password = $row['password'];

		if (password_verify($password, $hashed_password)) {
			return $access;
		} 
		return false;
	}
}
