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

            printf("Error Creating School: %s.\n", $stmt->error);
            return false;
        }

        public function update(){
            $query = "UPDATE schools 
                SET 
                    address = :address, 
                    barangay = :barangay,
                    city = :city,
                    province = :province,
                    country = :country,
                    postal_code = :postal_code,
                    principal_fn = :principal_fn,
                    principal_ln = :principal_ln,
                    principal_mn = :principal_mn,
                    school_name = :school_name
                WHERE id = :id";

            $stmt = $this->conn->prepare($query);

            $this->address = htmlspecialchars(strip_tags($this->address));
            $this->barangay = htmlspecialchars(strip_tags($this->barangay));
            $this->city = htmlspecialchars(strip_tags($this->city));
            $this->province = htmlspecialchars(strip_tags($this->province));
            $this->country = htmlspecialchars(strip_tags($this->country));
            $this->postal_code = htmlspecialchars(strip_tags($this->postal_code));
            $this->principal_fn = htmlspecialchars(strip_tags($this->principal_fn));
            $this->principal_ln = htmlspecialchars(strip_tags($this->principal_ln));
            $this->principal_mn = htmlspecialchars(strip_tags($this->principal_mn));
            $this->school_name = htmlspecialchars(strip_tags($this->school_name));


            $stmt->bindParam(':address', $this->address);
            $stmt->bindParam(':barangay', $this->barangay);
            $stmt->bindParam(':city', $this->city);
            $stmt->bindParam(':province', $this->province);
            $stmt->bindParam(':country', $this->country);
            $stmt->bindParam(':postal_code', $this->postal_code);
            $stmt->bindParam(':principal_fn', $this->principal_fn);
            $stmt->bindParam(':principal_ln', $this->principal_ln);
            $stmt->bindParam(':principal_mn', $this->principal_mn);
            $stmt->bindParam(':school_name', $this->school_name);
            $stmt->bindParam(':id', $this->id);

            if ($stmt->execute()) {
                return true;
            }

            printf("Error updating school: %s.\n", $stmt->error);
            return false;
        }

    }