<?php 
    class User {
        private $conn;

        // User Properties
        public $id;
        public $username;
        public $password;
        public $access;

        public function __construct($db){
            $this->conn = $db;
        }

        // // Get User
        // public function read(){
        //     $query = "SELECT * FROM ".$this->table;
        //     $stmt = $this->conn->prepare($query);
        //     $stmt->execute();
        //     return $stmt;
        // }

        // // Get Single User
        // public function read_single(){
        //     $query = "SELECT * FROM " . $this->table . " WHERE id = ? LIMIT 0,1";
        //     $stmt = $this->conn->prepare($query);
        //     $stmt->bindParam(1, $this->id);
        //     $stmt->execute();

        //     $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //     $this->id = $row['id'];
        //     $this->username = $row['username'];
        //     $this->password = $row['password'];
        //     $this->access = $row['access'];
        // }

        public function create(){
            $query = "INSERT INTO users SET password = :password, access = :access";
            $stmt = $this->conn->prepare($query);

            // clean
            $this->password = htmlspecialchars(strip_tags($this->password));

            // hash
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);

            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':access', $this->access);

            if ($stmt->execute()) {
                return $this->conn->lastInsertId();
            }

            // print error if something goes wrong
            printf("Error Creating User: %s.\n", $stmt->error);
            return false;
        }

    }