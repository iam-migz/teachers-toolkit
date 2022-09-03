<?php
namespace src;
use PDO;

class Database
{
	private $host = 'localhost';
	private $db_name = 'teachers_toolkit';
	private $username = 'root';
	private $password = '';

	public function getConnection(): PDO
	{
		$dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8";
		return new PDO($dsn, $this->username, $this->password);
	}
}
