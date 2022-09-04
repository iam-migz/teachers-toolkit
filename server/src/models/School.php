<?php
namespace src\models;
use src\Database;
use PDO;

class School
{
	private PDO $conn;

	public function __construct()
	{
		$db = new Database;
		$this->conn = $db->getConnection();
	}

	public function create(
		string $barangay,
		string $city,
		string $province,
		string $country,
		string $postal_code,
		string $principal_fn,
		string $principal_ln,
		string $principal_mn,
		string $school_name,
	) : string|false
	{
		$query = "INSERT INTO schools 
		SET 
				barangay = :barangay,
				city = :city,
				province = :province,
				country = :country,
				postal_code = :postal_code,
				principal_fn = :principal_fn,
				principal_ln = :principal_ln,
				principal_mn = :principal_mn,
				school_name = :school_name";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':barangay', $barangay);
		$stmt->bindParam(':city', $city);
		$stmt->bindParam(':province', $province);
		$stmt->bindParam(':country', $country);
		$stmt->bindParam(':postal_code', $postal_code);
		$stmt->bindParam(':principal_fn', $principal_fn);
		$stmt->bindParam(':principal_ln', $principal_ln);
		$stmt->bindParam(':principal_mn', $principal_mn);
		$stmt->bindParam(':school_name', $school_name);

		$stmt->execute();
		return $this->conn->lastInsertId();
	}

	public function update(
		$barangay,
		$city,
		$province,
		$country,
		$postal_code,
		$principal_fn,
		$principal_ln,
		$principal_mn,
		$school_name,
		$id
	) : bool
	{
		$query = "UPDATE schools 
							SET 
								barangay = :barangay,
								city = :city,
								province = :province,
								country = :country,
								postal_code = :postal_code,
								principal_fn = :principal_fn,
								principal_ln = :principal_ln,
								principal_mn = :principal_mn,
								school_name = :school_name
						WHERE id = :id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':barangay', $barangay);
		$stmt->bindParam(':city', $city);
		$stmt->bindParam(':province', $province);
		$stmt->bindParam(':country', $country);
		$stmt->bindParam(':postal_code', $postal_code);
		$stmt->bindParam(':principal_fn', $principal_fn);
		$stmt->bindParam(':principal_ln', $principal_ln);
		$stmt->bindParam(':principal_mn', $principal_mn);
		$stmt->bindParam(':school_name', $school_name);
		$stmt->bindParam(':id', $id);

		return $stmt->execute();	
	}

	public function findOne($id) : array | false
	{
		$query = 'SELECT * FROM schools WHERE id = :id LIMIT 0,1';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
}
