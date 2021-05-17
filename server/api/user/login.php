<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/User.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate model
    $user = new User($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    if ( !isset($data->id) || !isset($data->password) ){
        echo json_encode( array("result" => 0, "message" => "incomplete data") );
        return;
    }

    $user->id = $data->id;
    $user->password = $data->password;

    if ($acc_id = $user->login()) {
        
        session_start();
        $_SESSION['id'] = $acc_id;
        $_SESSION['access'] = $user->access;

        if ($user->access == 1 ){
            echo json_encode(
                array('result' => 1, 'message' => 'student logged in')
            );
        } else if ($user->access == 2) {
            echo json_encode(
                array('result' => 2, 'message' => 'teacher logged in')
            );
        } else if ($user->access == 3) {
            echo json_encode(
                array('result' => 3, 'message' => 'admin logged in')
            );
        }
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'incorrect login credentials')
        );
    }

