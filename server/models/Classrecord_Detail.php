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
                    WHERE 
                        id = :id";
            $stmt = $this->conn->prepare($query);

            $this->written_weight = htmlspecialchars(strip_tags($this->written_weight));
            $this->performance_weight = htmlspecialchars(strip_tags($this->performance_weight));
            $this->quarterly_weight = htmlspecialchars(strip_tags($this->quarterly_weight));

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

            $stmt->bindParam(':w1', $this->w1);
            $stmt->bindParam(':w2', $this->w2);
            $stmt->bindParam(':w3', $this->w3);
            $stmt->bindParam(':w4', $this->w4);
            $stmt->bindParam(':w5', $this->w5);
            $stmt->bindParam(':w6', $this->w6);
            $stmt->bindParam(':w7', $this->w7);
            $stmt->bindParam(':w8', $this->w8);
            $stmt->bindParam(':w9', $this->w9);
            $stmt->bindParam(':w10', $this->w10);

            $stmt->bindParam(':p1', $this->p1);
            $stmt->bindParam(':p2', $this->p2);
            $stmt->bindParam(':p3', $this->p3);
            $stmt->bindParam(':p4', $this->p4);
            $stmt->bindParam(':p5', $this->p5);
            $stmt->bindParam(':p6', $this->p6);
            $stmt->bindParam(':p7', $this->p7);
            $stmt->bindParam(':p8', $this->p8);
            $stmt->bindParam(':p9', $this->p9);
            $stmt->bindParam(':p10', $this->p10);

            $stmt->bindParam(':id', $this->id);

            if ($stmt->execute()) {
                return true;
            }

            printf("Error updating Classrecord: %s.\n", $stmt->error);
            return false;

        }

    }