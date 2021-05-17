<?php 
    class Student {
        private $conn;

        public $id;
        public $section_id;
        public $user_id;
        public $firstname;
        public $lastname;
        public $middlename;
        public $email;
        public $permanent_address;
        public $current_address;
        public $gender;
        public $LRN;
        public $birthdate;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create(){
            $query = "INSERT INTO students 
                SET 
                    user_id = :user_id, 
                    firstname = :firstname,
                    lastname = :lastname,
                    middlename = :middlename,
                    email = :email,
                    permanent_address = :permanent_address,
                    current_address = :current_address,
                    gender = :gender,
                    LRN = :LRN,
                    birthdate = :birthdate";

            $stmt = $this->conn->prepare($query);

            $this->user_id = htmlspecialchars(strip_tags($this->user_id));
            $this->firstname = htmlspecialchars(strip_tags($this->firstname));
            $this->lastname = htmlspecialchars(strip_tags($this->lastname));
            $this->middlename = htmlspecialchars(strip_tags($this->middlename));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->permanent_address = htmlspecialchars(strip_tags($this->permanent_address));
            $this->current_address = htmlspecialchars(strip_tags($this->current_address));
            $this->gender = htmlspecialchars(strip_tags($this->gender));
            $this->LRN = htmlspecialchars(strip_tags($this->LRN));
            $this->birthdate = htmlspecialchars(strip_tags($this->birthdate));



            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->bindParam(':firstname', $this->firstname);
            $stmt->bindParam(':lastname', $this->lastname);
            $stmt->bindParam(':middlename', $this->middlename);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':permanent_address', $this->permanent_address);
            $stmt->bindParam(':current_address', $this->current_address);
            $stmt->bindParam(':gender', $this->gender);
            $stmt->bindParam(':LRN', $this->LRN);
            $stmt->bindParam(':birthdate', $this->birthdate);

            if ($stmt->execute()) {
                $this->id = $this->conn->lastInsertId();
                return true;
            }

            // print error if something goes wrong
            printf("Error Creating Student: %s.\n", $stmt->error);
            return false;
        }

    }