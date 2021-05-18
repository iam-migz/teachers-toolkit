<?php 
    class School_Year {
        private $conn;

        // Subject Properties
        public $id;
        public $school_id;
        public $sy_start;
        public $sy_end;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create(){
            $query = "INSERT INTO school_years 
                SET 
                    school_id = :school_id, 
                    sy_start = :sy_start,
                    sy_end = :sy_end";

            $stmt = $this->conn->prepare($query);

            $this->school_id = htmlspecialchars(strip_tags($this->school_id));
            $this->sy_start = htmlspecialchars(strip_tags($this->sy_start));
            $this->sy_end = htmlspecialchars(strip_tags($this->sy_end));

            $stmt->bindParam(':school_id', $this->school_id);
            $stmt->bindParam(':sy_start', $this->sy_start);
            $stmt->bindParam(':sy_end', $this->sy_end);

            if ($stmt->execute()) {
                return $this->conn->lastInsertId();
            }

            printf("Error Creating School Year: %s.\n", $stmt->error);
            return false;
        }


    }