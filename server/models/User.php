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

            printf("Error Creating User: %s.\n", $stmt->error);
            return false;
        }

        public function login(){
            $query = "SELECT * FROM users WHERE id = :id LIMIT 0, 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->access = $row['access'];
            $hashed_password = $row['password'];

            if (password_verify($this->password, $hashed_password)) {
                // get the user type
                if ($this->access == 1) {
                    $user_table = "students";
                } else if ($this->access == 2) {
                    $user_table = "teachers";
                } else if ($this->access == 3) {
                    $user_table = "admins";
                }
                // get the id
                $stmt->closeCursor();
                $query = "SELECT id FROM ".$user_table." WHERE user_id = :id LIMIT 0, 1";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':id', $this->id);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                return $row['id'];
            } else {
                return false;
            }

            printf("Error: %s.\n", $stmt->error);
        }


    }