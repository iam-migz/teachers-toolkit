<?php
namespace server\oldModels;
class Section
{
	private $conn;

	// Admin Properties
	public $id;
	public $school_year_id;
	public $advisor_id;
	public $section_name;
	public $strand;
	public $track;
	public $grade;

	public function __construct($db)
	{
		$this->conn = $db;
	}

	public function create()
	{
		$query = "INSERT INTO sections 
                SET 
                    school_year_id = :school_year_id,
                    advisor_id = :advisor_id,
                    section_name = :section_name, 
                    strand = :strand,
                    track = :track,
                    grade = :grade";

		$stmt = $this->conn->prepare($query);

		$this->school_year_id = htmlspecialchars(strip_tags($this->school_year_id));
		$this->advisor_id = htmlspecialchars(strip_tags($this->advisor_id));
		$this->section_name = htmlspecialchars(strip_tags($this->section_name));
		$this->strand = htmlspecialchars(strip_tags($this->strand));
		$this->track = htmlspecialchars(strip_tags($this->track));
		$this->grade = htmlspecialchars(strip_tags($this->grade));

		$stmt->bindParam(':school_year_id', $this->school_year_id);
		$stmt->bindParam(':advisor_id', $this->advisor_id);
		$stmt->bindParam(':section_name', $this->section_name);
		$stmt->bindParam(':strand', $this->strand);
		$stmt->bindParam(':track', $this->track);
		$stmt->bindParam(':grade', $this->grade);

		if ($stmt->execute()) {
			$this->id = $this->conn->lastInsertId();
			return true;
		}

		printf("Error Creating Section: %s.\n", $stmt->error);
		return false;
	}

	public function update()
	{
		$query = "UPDATE sections 
                SET 
                    advisor_id = :advisor_id, 
                    section_name = :section_name, 
                    strand = :strand,
                    track = :track,
                    grade = :grade
                WHERE id = :id";

		$stmt = $this->conn->prepare($query);

		$this->section_name = htmlspecialchars(strip_tags($this->section_name));
		$this->strand = htmlspecialchars(strip_tags($this->strand));
		$this->track = htmlspecialchars(strip_tags($this->track));
		$this->grade = htmlspecialchars(strip_tags($this->grade));
		$this->id = htmlspecialchars(strip_tags($this->id));
		$this->advisor_id = htmlspecialchars(strip_tags($this->advisor_id));

		$stmt->bindParam(':section_name', $this->section_name);
		$stmt->bindParam(':strand', $this->strand);
		$stmt->bindParam(':track', $this->track);
		$stmt->bindParam(':grade', $this->grade);
		$stmt->bindParam(':id', $this->id);
		$stmt->bindParam(':advisor_id', $this->advisor_id);

		if ($stmt->execute()) {
			return true;
		}

		printf("Error updating section: %s.\n", $stmt->error);
		return false;
	}

	public function read()
	{
		$query = 'SELECT * FROM sections WHERE school_year_id = :school_year_id';
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':school_year_id', $this->school_year_id);

		$stmt->execute();
		return $stmt;
	}

	public function read_one()
	{
		$query = 'SELECT * FROM sections WHERE id = :id';
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':id', $this->id);

		$stmt->execute();
		return $stmt;
	}

	public function read_advisor()
	{
		$query = "SELECT 	*
            FROM 	sections sec
            WHERE 	sec.advisor_id = (SELECT id FROM teachers WHERE id = :advisor_id)
                    AND sec.school_year_id = :school_year_id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':advisor_id', $this->advisor_id);
		$stmt->bindParam(':school_year_id', $this->school_year_id);

		$stmt->execute();
		return $stmt;
	}
}
