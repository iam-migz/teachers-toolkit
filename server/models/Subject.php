<?php 
    class Subject {
        private $conn;

        // Subject Properties
        public $id;
        public $school_year_id;
        public $subject_name;
        public $semester;
        public $hours;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create(){
            $query = "INSERT INTO subjects 
                SET 
                    school_year_id = :school_year_id, 
                    subject_name = :subject_name, 
                    semester = :semester,
                    hours = :hours";

            $stmt = $this->conn->prepare($query);

            $this->school_year_id = htmlspecialchars(strip_tags($this->school_year_id));
            $this->subject_name = htmlspecialchars(strip_tags($this->subject_name));
            $this->semester = htmlspecialchars(strip_tags($this->semester));
            $this->hours = htmlspecialchars(strip_tags($this->hours));

            $stmt->bindParam(':school_year_id', $this->school_year_id);
            $stmt->bindParam(':subject_name', $this->subject_name);
            $stmt->bindParam(':semester', $this->semester);
            $stmt->bindParam(':hours', $this->hours);

            if ($stmt->execute()) {
                return true;
            }

            printf("Error Creating Subject: %s.\n", $stmt->error);
            return false;
        }

        public function update(){
            $query = "UPDATE subjects 
                SET 
                    subject_name = :subject_name,
                    semester = :semester,
                    hours = :hours
                WHERE id = :id";

            $stmt = $this->conn->prepare($query);

            $this->subject_name = htmlspecialchars(strip_tags($this->subject_name));
            $this->semester = htmlspecialchars(strip_tags($this->semester));
            $this->hours = htmlspecialchars(strip_tags($this->hours));

            $stmt->bindParam(':subject_name', $this->subject_name);
            $stmt->bindParam(':semester', $this->semester);
            $stmt->bindParam(':hours', $this->hours);
            $stmt->bindParam(':id', $this->id);

            if ($stmt->execute()) {
                return true;
            }

            printf("Error updating subject: %s.\n", $stmt->error);
            return false;
        }


        public function read(){
            $query = "SELECT * FROM subjects WHERE school_year_id = :school_year_id";
            $stmt = $this->conn->prepare($query);

            $this->school_year_id = htmlspecialchars(strip_tags($this->school_year_id));
            $stmt->bindParam(':school_year_id', $this->school_year_id);

            $stmt->execute();
            return $stmt;
        }

        public function read_one(){
            $query = "SELECT * FROM subjects WHERE id = :id";
            $stmt = $this->conn->prepare($query);

            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id', $this->id);

            $stmt->execute();
            return $stmt;
        }

        public function read_by_section($section_id){
            $query = "SELECT 	*
                      FROM 	    subjects sub
                      WHERE 	sub.id IN 
                                    (SELECT sa.subject_id FROM subject_assignments sa WHERE sa.section_id = :section_id)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':section_id', $section_id);

            $stmt->execute();
            return $stmt;
        }

    }