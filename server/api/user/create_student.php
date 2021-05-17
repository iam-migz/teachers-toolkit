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
        !isset($data->province) ||
        !isset($data->city) ||
        !isset($data->barangay) ||
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

    $student->province = $data->province;
    $student->city = $data->city;
    $student->barangay = $data->barangay;
    $student->gender = $data->gender;
    $student->LRN = $data->LRN;
    $student->birthdate = $data->birthdate;

    if ($student->create()) {
        session_start();
        $_SESSION['id'] = $student->id;
        $_SESSION['access'] = 1;
        echo json_encode(
            array('result' => 1, 'message' => 'success')
        );
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'failed to create admin')
        );
    }

