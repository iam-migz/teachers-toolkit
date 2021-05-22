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

        public function read_assigned(){
            $query = "SELECT 	sec.section_name, sec.grade,  sub.subject_name, CONCAT(t.firstname,' ',t.lastname,' ',t.middlename) as teacher_name
                      FROM 	    subject_assignments sa, subjects sub, teachers t, sections sec
                      WHERE 	sa.section_id IN (SELECT id FROM sections WHERE sections.school_year_id = :school_year_id) AND 
                                sub.id = sa.subject_id AND 
                                t.id = sa.teacher_id AND
                                sec.id = sa.section_id";
            $stmt = $this->conn->prepare($query);

            $this->school_year_id = htmlspecialchars(strip_tags($this->school_year_id));
            $stmt->bindParam(':school_year_id', $this->school_year_id);

            $stmt->execute();
            return $stmt;
        }


    }