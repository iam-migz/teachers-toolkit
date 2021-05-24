<?php 
    class Student_Assignment {
        private $conn;

        // Properties
        public $id;
        public $student_id;
        public $section_id;


        public function __construct($db){
            $this->conn = $db;
        }

        public function create(){

            $query = "INSERT INTO student_assignments
                SET 
                    student_id = :student_id,
                    section_id = :section_id";

            $stmt = $this->conn->prepare($query);

            $this->student_id = htmlspecialchars(strip_tags($this->student_id));
            $this->section_id = htmlspecialchars(strip_tags($this->section_id));

            $stmt->bindParam(':student_id', $this->student_id);
            $stmt->bindParam(':section_id', $this->section_id);
 
            if ($stmt->execute()) {
                return true;
            }

            printf("Error Creating Student_Assignment: %s.\n", $stmt->error);
            return false;
        }

        public function read_unassigned(){
            $query = "SELECT    stud.id, CONCAT(stud.firstname,' ',stud.middlename,' ',stud.lastname) as name, stud.LRN
                      FROM 	    students stud
                      WHERE 	stud.id NOT IN (SELECT student_id FROM student_assignments) AND
                                stud.continuing = 1 AND
                                stud.completed = 0";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function read_by_section(){
            $query = "SELECT    stud.id, sec.section_name, stud.LRN, CONCAT(stud.firstname, ' ', stud.middlename, ' ', stud.lastname) as student_name, stud.email, stud.gender, CONCAT(stud.barangay, ' ', stud.city, ' ', stud.province) as address
                      FROM 	    student_assignments sa, sections sec, students stud
                      WHERE 	sa.section_id = :section_id AND 
                                sa.section_id = sec.id AND
                                sa.student_id = stud.id";

            $stmt = $this->conn->prepare($query);

            $this->section_id = htmlspecialchars(strip_tags($this->section_id));
            $stmt->bindParam(':section_id', $this->section_id);

            $stmt->execute();
            return $stmt;
        }

        




    }