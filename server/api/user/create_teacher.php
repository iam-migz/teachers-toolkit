<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/User.php';
    include_once '../../models/Teacher.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate model
    $user = new User($db);
    $teacher = new Teacher($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    if ( 
        !isset($data->firstname) ||
        !isset($data->lastname) ||
        !isset($data->middlename) ||
        !isset($data->phone_no) ||
        !isset($data->email)
    ){
        echo json_encode( array("result" => 0, "message" => "incomplete data") );
        return;
    }

    // Create user
    $user->password = $data->firstname.$data->lastname;
    $user->access = 2;
    $user_id = $user->create();
        
    // Create teacher
    $teacher->user_id = $user_id;
    $teacher->firstname = $data->firstname;
    $teacher->lastname = $data->lastname;
    $teacher->middlename = $data->middlename;
    $teacher->phone_no = $data->phone_no;
    $teacher->email = $data->email;


    if ($teacher->create()) {
        session_start();
        $_SESSION['user_id'] = $user_id;
        $_SESSION['account_id'] = $teacher->id;
        $_SESSION['access'] = 2;
        echo json_encode(
            array('result' => 1, 'message' => 'successfully created teacher')
        );
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'failed to create teacher')
        );
    }

