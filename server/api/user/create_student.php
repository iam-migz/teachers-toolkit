<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/User.php';
    include_once '../../models/Student.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate model
    $user = new User($db);
    $student = new Student($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    if ( 
        !isset($data->firstname) ||
        !isset($data->lastname) ||
        !isset($data->middlename) ||
        !isset($data->email) ||
        !isset($data->permanent_address) ||
        !isset($data->current_address) ||
        !isset($data->gender) ||
        !isset($data->LRN) ||
        !isset($data->birthdate)
    ){
        echo json_encode( array("result" => 0, "message" => "incomplete data") );
        return;
    }

    // Create user
    $user->password = $data->firstname.$data->lastname;
    $user->access = 1;
    $user_id = $user->create();
        
    // Create student
    $student->user_id = $user_id;
    $student->firstname = $data->firstname;
    $student->lastname = $data->lastname;
    $student->middlename = $data->middlename;
    $student->email = $data->email;

    if ($admin->create()) {
        session_start();
        $_SESSION['id'] = $admin->id;
        $_SESSION['access'] = 3;
        echo json_encode(
            array('result' => 1, 'message' => 'success')
        );
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'failed to create admin')
        );
    }

