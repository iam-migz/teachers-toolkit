<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/User.php';
    include_once '../../models/Admin.php';
    include_once '../../models/School.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate model
    $user = new User($db);
    $admin = new Admin($db);
    $school = new School($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    if ( 
        !isset($data->password) ||
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
    $user->password = $data->password;
    $user->access = 3;
    $user_id = $user->create();
        
    // Create school
    $school_id = $school->create();

    // Create admin
    $admin->user_id = $user_id;
    $admin->school_id = $school_id;
    $admin->firstname = $data->firstname;
    $admin->lastname = $data->lastname;
    $admin->middlename = $data->middlename;
    $admin->phone_no = $data->phone_no;
    $admin->email = $data->email;

    if ($admin->create()) {
        session_start();
        $_SESSION['user_id'] = $user_id;
        $_SESSION['account_id'] = $admin->id;
        $_SESSION['access'] = 3;
        echo json_encode(
            array('result' => 1, 'message' => 'success')
        );
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'failed to create admin')
        );
    }

