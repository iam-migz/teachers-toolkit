<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Teacher.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate model
    $teacher = new Teacher($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    if ( 
        !isset($data->id) ||
        !isset($data->continuing) ||
        !isset($data->firstname) ||
        !isset($data->lastname) ||
        !isset($data->middlename) ||
        !isset($data->phone_no) ||
        !isset($data->email)
    ){
        echo json_encode( array("result" => 0, "message" => "incomplete data") );
        return;
    }

    $teacher->id = $data->id;
    $teacher->continuing = $data->continuing;
    $teacher->firstname = $data->firstname;
    $teacher->lastname = $data->lastname;
    $teacher->middlename = $data->middlename;
    $teacher->phone_no = $data->phone_no;
    $teacher->email = $data->email;

    if ($teacher->update()) {
        echo json_encode(
            array('result' => 1, 'message' => 'teacher updated')
        );
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'failed to update teacher')
        );
    }

