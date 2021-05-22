<?php 
    class Subject_Assignment {
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

            $this->section_id = htmlspecialchars(strip_tags($this->section_id));
            $this->subject_id = htmlspecialchars(strip_tags($this->subject_id));
            $this->teacher_id = htmlspecialchars(strip_tags($this->teacher_id));

            // check if already exists
            $query = "SELECT id FROM subject_assignments WHERE 
                section_id = :section_id AND 
                subject_id = :subject_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':section_id', $this->section_id);
            $stmt->bindParam(':subject_id', $this->subject_id);
            $stmt->execute();
            $duplicate = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$duplicate) {
                $query = "INSERT INTO subject_assignments 
                SET 
                    section_id = :section_id, 
                    subject_id = :subject_id,
                    teacher_id = :teacher_id";

                $stmt = $this->conn->prepare($query);

                $stmt->bindParam(':section_id', $this->section_id);
                $stmt->bindParam(':subject_id', $this->subject_id);
                $stmt->bindParam(':teacher_id', $this->teacher_id);

                if ($stmt->execute()) {
                    return true;
                }
            }
            
            return false;
        }

        public function update(){
            $query = "UPDATE subject_assignments 
                SET 
                    section_id = :section_id, 
                    subject_id = :subject_id,
                    teacher_id = :teacher_id
                WHERE 
                    id = :id";

            $stmt = $this->conn->prepare($query);

            $this->section_id = htmlspecialchars(strip_tags($this->section_id));
            $this->subject_id = htmlspecialchars(strip_tags($this->subject_id));
            $this->teacher_id = htmlspecialchars(strip_tags($this->teacher_id));

            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':section_id', $this->section_id);
            $stmt->bindParam(':subject_id', $this->subject_id);
            $stmt->bindParam(':teacher_id', $this->teacher_id);

            if ($stmt->execute()) {
                return true;
            }

            printf("Error Creating School Year: %s.\n", $stmt->error);
            return false;
        }

        public function read(){
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