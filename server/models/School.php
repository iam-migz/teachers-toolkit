<?php 
    class School {
        private $conn;

        // Admin Properties
        public $id;
        public $address;
        public $barangay;
        public $city;
        public $province;
        public $country;
        public $postal_code;
        public $principal_fn;
        public $principal_ln;
        public $principal_mn;
        public $school_name;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create(){
            $query = "INSERT INTO `schools`() VALUES ()";

            $stmt = $this->conn->prepare($query);

            if ($stmt->execute()) {
                return $this->conn->lastInsertId();
            }

            // print error if something goes wrong
            printf("Error Creating School: %s.\n", $stmt->error);
            return false;
        }

    }