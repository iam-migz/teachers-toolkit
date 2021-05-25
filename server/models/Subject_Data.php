<?php 
    class Subject_Data {
        private $conn;

        // Subject Properties
        public $id;
        public $subject_assignment_id;
        public $student_id;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create(){
            $query = "INSERT INTO subject_data 
            SET 
                student_id = :student_id, 
                subject_assignment_id = :subject_assignment_id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':student_id', $this->student_id);
            $stmt->bindParam(':subject_assignment_id', $this->subject_assignment_id);

            if ($stmt->execute()) {
                $this->id = $this->conn->lastInsertId();
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
            return false;
        }



    }