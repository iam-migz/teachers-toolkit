<?php 
    class Subject {
        private $conn;

        // Subject Properties
        public $id;
        public $subject_name;
        public $semester;
        public $hours;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create(){
            $query = "INSERT INTO subjects 
                SET 
                    subject_name = :subject_name, 
                    semester = :semester,
                    hours = :hours";

            $stmt = $this->conn->prepare($query);

            $this->subject_name = htmlspecialchars(strip_tags($this->subject_name));
            $this->semester = htmlspecialchars(strip_tags($this->semester));
            $this->hours = htmlspecialchars(strip_tags($this->hours));

            $stmt->bindParam(':subject_name', $this->subject_name);
            $stmt->bindParam(':semester', $this->semester);
            $stmt->bindParam(':hours', $this->hours);

            if ($stmt->execute()) {
                return $this->conn->lastInsertId();
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

    }