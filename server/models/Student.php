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
        public $province;
        public $city;
        public $barangay;
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
                    province = :province,
                    city = :city,
                    barangay = :barangay,
                    gender = :gender,
                    LRN = :LRN,
                    birthdate = :birthdate";

            $stmt = $this->conn->prepare($query);

            $this->user_id = htmlspecialchars(strip_tags($this->user_id));
            $this->firstname = htmlspecialchars(strip_tags($this->firstname));
            $this->lastname = htmlspecialchars(strip_tags($this->lastname));
            $this->middlename = htmlspecialchars(strip_tags($this->middlename));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->province = htmlspecialchars(strip_tags($this->province));
            $this->city = htmlspecialchars(strip_tags($this->city));
            $this->barangay = htmlspecialchars(strip_tags($this->barangay));
            $this->gender = htmlspecialchars(strip_tags($this->gender));
            $this->LRN = htmlspecialchars(strip_tags($this->LRN));
            $this->birthdate = htmlspecialchars(strip_tags($this->birthdate));



            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->bindParam(':firstname', $this->firstname);
            $stmt->bindParam(':lastname', $this->lastname);
            $stmt->bindParam(':middlename', $this->middlename);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':province', $this->province);
            $stmt->bindParam(':city', $this->city);
            $stmt->bindParam(':barangay', $this->barangay);
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

        public function read(){
            $query = "SELECT * FROM students";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

    }