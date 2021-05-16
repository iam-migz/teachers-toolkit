<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/User.php';
    include_once '../../models/Admin.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate model
    $user = new User($db);
    $admin = new Admin($db);

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

    $user->password = $data->password;
    $user->access = 3;
    
    // Create user
    if ($user_id = $user->create()) {
        
        $admin->user_id = $user_id;
        $admin->firstname = $data->firstname;
        $admin->lastname = $data->lastname;
        $admin->middlename = $data->middlename;
        $admin->phone_no = $data->phone_no;
        $admin->email = $data->email;

        if ($admin->create()) {
            echo json_encode(
                array('result' => 1, 'message' => 'admin created')
            );
        }
    } else {
        echo json_encode(
            array('result' => 0)
        );
    }
