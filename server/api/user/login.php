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
        if ($access == 1 ){
            // student
        } else if ($access == 2) {
            // teacher
        } else if ($access == 3) {
            // admin
            header('Location: ../../../client/index.html');
        }
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'not logged in')
        );
    }

