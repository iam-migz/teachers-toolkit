<?php 
    class Teacher {
        private $conn;

        public $id;
        public $user_id;
        public $firstname;
        public $lastname;
        public $middlename;
        public $phone_no;
        public $email;
        public $continuing;
        public $school_id;


        public function __construct($db){
            $this->conn = $db;
        }

        public function create(){
            $query = "INSERT INTO teachers 
                SET 
                    user_id = :user_id, 
                    school_id = :school_id, 
                    firstname = :firstname,
                    lastname = :lastname,
                    middlename = :middlename,
                    phone_no = :phone_no,
                    email = :email";

            $stmt = $this->conn->prepare($query);

            $this->user_id = htmlspecialchars(strip_tags($this->user_id));
            $this->school_id = htmlspecialchars(strip_tags($this->school_id));
            $this->firstname = htmlspecialchars(strip_tags($this->firstname));
            $this->lastname = htmlspecialchars(strip_tags($this->lastname));
            $this->middlename = htmlspecialchars(strip_tags($this->middlename));
            $this->phone_no = htmlspecialchars(strip_tags($this->phone_no));
            $this->email = htmlspecialchars(strip_tags($this->email));



            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->bindParam(':school_id', $this->school_id);
            $stmt->bindParam(':firstname', $this->firstname);
            $stmt->bindParam(':lastname', $this->lastname);
            $stmt->bindParam(':middlename', $this->middlename);
            $stmt->bindParam(':phone_no', $this->phone_no);
            $stmt->bindParam(':email', $this->email);

            if ($stmt->execute()) {
                $this->id = $this->conn->lastInsertId();
                return true;
            }

            // print error if something goes wrong
            printf("Error Creating Teacher: %s.\n", $stmt->error);
            return false;
        }

        public function read(){
            $query = "SELECT * FROM teachers";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
    }