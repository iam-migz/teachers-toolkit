<?php

namespace src\config;
use PDO;
use PDOException;

class Dbh
{
	private $host = 'localhost';
	private $db_name = 'teachers_toolkit';
	private $username = 'root';
	private $password = '';
	protected $conn = null;

	public function __construct()
	{
		try {
			$this->conn = new PDO(
				'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
				$this->username,
				$this->password
			);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo 'Connection Error: ' . $e->getMessage();
			die();
		}
	}
}
