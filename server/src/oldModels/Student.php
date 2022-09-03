<?php

namespace server\oldModels;
use src\config\Dbh;

class Student extends Dbh
{
	public $id;
	public $section_id;
	public $user_id;

	public $school_id;
	public $continuing;
	public $completed;

	public $firstname;
	public $lastname;
	public $middlename;
	public $email;
	public $province;
	public $city;
	public $barangay;
	public $gender;
	public $LRN;
	public $birthdate;

	public function create()
	{
		$query = "INSERT INTO students 
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
                birthdate = :birthdate";

		$stmt = $this->conn->prepare($query);

		$this->user_id = htmlspecialchars(strip_tags($this->user_id));
		$this->school_id = htmlspecialchars(strip_tags($this->school_id));
		$this->firstname = htmlspecialchars(strip_tags($this->firstname));
		$this->lastname = htmlspecialchars(strip_tags($this->lastname));
		$this->middlename = htmlspecialchars(strip_tags($this->middlename));
		$this->email = htmlspecialchars(strip_tags($this->email));
		$this->province = htmlspecialchars(strip_tags($this->province));
		$this->city = htmlspecialchars(strip_tags($this->city));
		$this->barangay = htmlspecialchars(strip_tags($this->barangay));
		$this->gender = htmlspecialchars(strip_tags($this->gender));
		$this->LRN = htmlspecialchars(strip_tags($this->LRN));
		$this->birthdate = htmlspecialchars(strip_tags($this->birthdate));

		$stmt->bindParam(':user_id', $this->user_id);
		$stmt->bindParam(':school_id', $this->school_id);
		$stmt->bindParam(':firstname', $this->firstname);
		$stmt->bindParam(':lastname', $this->lastname);
		$stmt->bindParam(':middlename', $this->middlename);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':province', $this->province);
		$stmt->bindParam(':city', $this->city);
		$stmt->bindParam(':barangay', $this->barangay);
		$stmt->bindParam(':gender', $this->gender);
		$stmt->bindParam(':LRN', $this->LRN);
		$stmt->bindParam(':birthdate', $this->birthdate);

		if ($stmt->execute()) {
			$this->id = $this->conn->lastInsertId();
			return true;
		}

		return false;
	}

	public function read()
	{
		$query = 'SELECT * FROM students WHERE school_id = :school_id AND continuing = 1 AND completed = 0';
		$stmt = $this->conn->prepare($query);

		$this->school_id = htmlspecialchars(strip_tags($this->school_id));
		$stmt->bindParam(':school_id', $this->school_id);

		$stmt->execute();
		return $stmt;
	}

	public function read_one()
	{
		$query = 'SELECT * FROM students WHERE id = :id LIMIT 0,1';
		$stmt = $this->conn->prepare($query);

		$this->id = htmlspecialchars(strip_tags($this->id));
		$stmt->bindParam(':id', $this->id);

		$stmt->execute();
		return $stmt;
	}

	public function update()
	{
		$query = "UPDATE students 
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
                id = :id";

		$stmt = $this->conn->prepare($query);

		$this->completed = htmlspecialchars(strip_tags($this->completed));
		$this->continuing = htmlspecialchars(strip_tags($this->continuing));
		$this->firstname = htmlspecialchars(strip_tags($this->firstname));
		$this->lastname = htmlspecialchars(strip_tags($this->lastname));
		$this->middlename = htmlspecialchars(strip_tags($this->middlename));
		$this->email = htmlspecialchars(strip_tags($this->email));
		$this->province = htmlspecialchars(strip_tags($this->province));
		$this->city = htmlspecialchars(strip_tags($this->city));
		$this->barangay = htmlspecialchars(strip_tags($this->barangay));
		$this->gender = htmlspecialchars(strip_tags($this->gender));
		$this->LRN = htmlspecialchars(strip_tags($this->LRN));
		$this->birthdate = htmlspecialchars(strip_tags($this->birthdate));

		$stmt->bindParam(':id', $this->id);
		$stmt->bindParam(':completed', $this->completed);
		$stmt->bindParam(':continuing', $this->continuing);
		$stmt->bindParam(':firstname', $this->firstname);
		$stmt->bindParam(':lastname', $this->lastname);
		$stmt->bindParam(':middlename', $this->middlename);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':province', $this->province);
		$stmt->bindParam(':city', $this->city);
		$stmt->bindParam(':barangay', $this->barangay);
		$stmt->bindParam(':gender', $this->gender);
		$stmt->bindParam(':LRN', $this->LRN);
		$stmt->bindParam(':birthdate', $this->birthdate);

		if ($stmt->execute()) {
			return true;
		}

		return false;
	}
}
