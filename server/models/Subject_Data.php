<?php 
    class Subject_Data {
        private $conn;

        // Subject Properties
        public $id;
        public $subject_assignment_id;
        public $student_id;
        public $grade_id;
        public $attendance_id;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create(){
            $query = "INSERT INTO subject_data 
            SET 
                student_id = :student_id, 
                subject_assignment_id = :subject_assignment_id, 
                grade_id = :grade_id,
                attendance_id = :attendance_id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':student_id', $this->student_id);
            $stmt->bindParam(':subject_assignment_id', $this->subject_assignment_id);
            $stmt->bindParam(':grade_id', $this->grade_id);
            $stmt->bindParam(':attendance_id', $this->attendance_id);

            if ($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
            return false;
        }


    }