<?php 
    class School_Record {
        private $conn;

        // Subject Properties
        public $id;
        public $section_id;
        public $subject_id;
        public $teacher_id;
        public $school_year_id;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create(){
            $query = "INSERT INTO school_records 
                SET 
                    section_id = :section_id, 
                    subject_id = :subject_id,
                    teacher_id = :teacher_id,
                    school_year_id = :school_year_id";

            $stmt = $this->conn->prepare($query);

            $this->section_id = htmlspecialchars(strip_tags($this->section_id));
            $this->subject_id = htmlspecialchars(strip_tags($this->subject_id));
            $this->teacher_id = htmlspecialchars(strip_tags($this->teacher_id));
            $this->school_year_id = htmlspecialchars(strip_tags($this->school_year_id));

            $stmt->bindParam(':section_id', $this->section_id);
            $stmt->bindParam(':subject_id', $this->subject_id);
            $stmt->bindParam(':teacher_id', $this->teacher_id);
            $stmt->bindParam(':school_year_id', $this->school_year_id);

            if ($stmt->execute()) {
                return $this->conn->lastInsertId();
            }

            printf("Error Creating School Year: %s.\n", $stmt->error);
            return false;
        }


    }