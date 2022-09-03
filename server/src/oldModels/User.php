<?php
namespace server\oldModels;
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

	public function create()
	{
		$query = 'INSERT INTO users SET password = :password, access = :access';
		$stmt = $this->conn->prepare($query);

		// clean
		$this->password = htmlspecialchars(strip_tags($this->password));

		// hash
		$this->password = password_hash($this->password, PASSWORD_DEFAULT);

		$stmt->bindParam(':password', $this->password);
		$stmt->bindParam(':access', $this->access);

		if ($stmt->execute()) {
			return $this->conn->lastInsertId();
		}

		printf("Error Creating User: %s.\n", $stmt->error);
		return false;
	}

	public function login(string $id, string $password)
	{
		$query = 'SELECT * FROM users WHERE id = :id LIMIT 0, 1';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$access = $row['access'];
		$hashed_password = $row['password'];

		if (password_verify($this->password, $hashed_password)) {
			// get the user type
			if ($access == 1) {
				$user_table = 'students';
			} elseif ($access == 2) {
				$user_table = 'teachers';
			} elseif ($access == 3) {
				$user_table = 'admins';
			}
			// get the account_id, school_id
			$stmt->closeCursor();
			$query = 'SELECT id, school_id FROM ' . $user_table . ' WHERE user_id = :id LIMIT 0, 1';
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':id', $this->id);
			$stmt->execute();
			$row = $stmt->fetch();

			$this->account_id = $row['id'];
			$this->school_id = $row['school_id'];
			return true;
		} else {
			return false;
		}

		printf("Error: %s.\n", $stmt->error);
	}
}
