<?php 
    class Classrecord_Detail {
        private $conn;

        // Properties
        public $id;
        public $subject_data_id;
        public $quarter;

        public $written_weight;
        public $performance_weight;
        public $quarterly_weight;

        public $hw1;
        public $hw2;
        public $hw3;
        public $hw4;
        public $hw5;
        public $hw6;
        public $hw7;
        public $hw8;
        public $hw9;
        public $hw10;

        public $hp1;
        public $hp2;
        public $hp3;
        public $hp4;
        public $hp5;
        public $hp6;
        public $hp7;
        public $hp8;
        public $hp9;
        public $hp10;

        public $hq1;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create(){

            $query = "INSERT INTO classrecord_details
                      SET 
                        subject_data_id = :subject_data_id,
                        quarter = :quarter";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':subject_data_id', $this->subject_data_id);
            $stmt->bindParam(':quarter', $this->quarter);
            

            if ($stmt->execute()) {
                return true;
            }

            printf("Error Creating Classrecord_details: %s.\n", $stmt->error);
            return false;
        }

        public function update(){
            $query = "UPDATE classrecord_details 
                      SET 
                        written_weight = :written_weight,
                        performance_weight = :performance_weight,
                        quarterly_weight = :quarterly_weight,
                        hw1 = :hw1,   
                        hw2 = :hw2,   
                        hw3 = :hw3,   
                        hw4 = :hw4,   
                        hw5 = :hw5,   
                        hw6 = :hw6,   
                        hw7 = :hw7,   
                        hw8 = :hw8,   
                        hw9 = :hw9,   
                        hw10 = :hw10,   
                        hp1 = :hp1,   
                        hp2 = :hp2,   
                        hp3 = :hp3,   
                        hp4 = :hp4,   
                        hp5 = :hp5,   
                        hp6 = :hp6,   
                        hp7 = :hp7,   
                        hp8 = :hp8,   
                        hp9 = :hp9,   
                        hp10 = :hp10,   
                        hq1 = :hq1
                    WHERE 
                        id = :id";
            $stmt = $this->conn->prepare($query);

            $this->written_weight = htmlspecialchars(strip_tags($this->written_weight));
            $this->performance_weight = htmlspecialchars(strip_tags($this->performance_weight));
            $this->quarterly_weight = htmlspecialchars(strip_tags($this->quarterly_weight));

            $this->hw1 = htmlspecialchars(strip_tags($this->hw1));
            $this->hw2 = htmlspecialchars(strip_tags($this->hw2));
            $this->hw3 = htmlspecialchars(strip_tags($this->hw3));
            $this->hw4 = htmlspecialchars(strip_tags($this->hw4));
            $this->hw5 = htmlspecialchars(strip_tags($this->hw5));
            $this->hw6 = htmlspecialchars(strip_tags($this->hw6));
            $this->hw7 = htmlspecialchars(strip_tags($this->hw7));
            $this->hw8 = htmlspecialchars(strip_tags($this->hw8));
            $this->hw9 = htmlspecialchars(strip_tags($this->hw9));
            $this->hw10 = htmlspecialchars(strip_tags($this->hw10));

            $this->hp1 = htmlspecialchars(strip_tags($this->hp1));
            $this->hp2 = htmlspecialchars(strip_tags($this->hp2));
            $this->hp3 = htmlspecialchars(strip_tags($this->hp3));
            $this->hp4 = htmlspecialchars(strip_tags($this->hp4));
            $this->hp5 = htmlspecialchars(strip_tags($this->hp5));
            $this->hp6 = htmlspecialchars(strip_tags($this->hp6));
            $this->hp7 = htmlspecialchars(strip_tags($this->hp7));
            $this->hp8 = htmlspecialchars(strip_tags($this->hp8));
            $this->hp9 = htmlspecialchars(strip_tags($this->hp9));
            $this->hp10 = htmlspecialchars(strip_tags($this->hp10));

            $this->hq1 = htmlspecialchars(strip_tags($this->hq1));

            $stmt->bindParam(':written_weight', $this->written_weight);
            $stmt->bindParam(':performance_weight', $this->performance_weight);
            $stmt->bindParam(':quarterly_weight', $this->quarterly_weight);
            
            $stmt->bindParam(':hw1', $this->hw1);
            $stmt->bindParam(':hw2', $this->hw2);
            $stmt->bindParam(':hw3', $this->hw3);
            $stmt->bindParam(':hw4', $this->hw4);
            $stmt->bindParam(':hw5', $this->hw5);
            $stmt->bindParam(':hw6', $this->hw6);
            $stmt->bindParam(':hw7', $this->hw7);
            $stmt->bindParam(':hw8', $this->hw8);
            $stmt->bindParam(':hw9', $this->hw9);
            $stmt->bindParam(':hw10', $this->hw10);

            $stmt->bindParam(':hp1', $this->hp1);
            $stmt->bindParam(':hp2', $this->hp2);
            $stmt->bindParam(':hp3', $this->hp3);
            $stmt->bindParam(':hp4', $this->hp4);
            $stmt->bindParam(':hp5', $this->hp5);
            $stmt->bindParam(':hp6', $this->hp6);
            $stmt->bindParam(':hp7', $this->hp7);
            $stmt->bindParam(':hp8', $this->hp8);
            $stmt->bindParam(':hp9', $this->hp9);
            $stmt->bindParam(':hp10', $this->hp10);

            $stmt->bindParam(':hq1', $this->hq1);

            $stmt->bindParam(':id', $this->id);

            if ($stmt->execute()) {
                return true;
            }

            printf("Error updating Classrecord: %s.\n", $stmt->error);
            return false;

        }

        public function read_by_subject_assignment($subject_assignment_id, $quarter){
            $query = "SELECT 	crd.written_weight, crd.performance_weight, crd.quarterly_weight, crd.id,
                                hw1, hw2, hw3, hw4, hw5, hw6, hw7, hw8, hw9, hw10, 
                                hp1, hp2, hp3, hp4, hp5, hp6, hp7, hp8, hp9, hp10, hq1
                      FROM 	    subject_data sd, classrecord_details crd	
                      WHERE 	sd.subject_assignment_id = :subject_assignment_id
                                AND sd.id = crd.subject_data_id
                                AND crd.quarter = :quarter
                      LIMIT     0,1";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':subject_assignment_id', $subject_assignment_id);
            $stmt->bindParam(':quarter', $quarter);
            $stmt->execute();

            return $stmt;
        }

    }