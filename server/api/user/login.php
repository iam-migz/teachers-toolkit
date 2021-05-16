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

    if ($access = $user->login()) {
        
        session_start();
        $_SESSION['id'] = $user->id;
        $_SESSION['access'] = $access;

        if ($access == 1 ){
            // student
        } else if ($access == 2) {
            // teacher
        } else if ($access == 3) {
            // admin
            echo json_encode(
                array('result' => 3, 'message' => 'logged in')
            );
        }
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'incorrect login credentials')
        );
    }

