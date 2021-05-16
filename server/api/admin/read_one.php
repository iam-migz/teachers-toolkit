<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Admin.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate user object
    $admin = new Admin($db);


    if ( !isset($_GET['id']) ){
        echo json_encode(
            array('result' => 0, 'message' => 'missing id')
        );
    }

    $admin->id = $_GET['id'];
    $result = $admin->read_one();

    if ($result->rowCount()) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $response = array(
            'id' => $id,
            'user_id' => $user_id,
            'school_id' => $school_id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'middlename' => $middlename,
            'phone_no' => $phone_no,
            'email' => $email
        );
    
        echo json_encode($response);
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'not found')
        );
    }

