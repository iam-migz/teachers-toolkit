<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/School_Year.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate model
    $school_year = new School_Year($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    if ( 
        !isset($data->school_id) ||
        !isset($data->sy_start) ||
        !isset($data->sy_end) 
    ){
        echo json_encode( array("result" => 0, "message" => "incomplete data") );
        return;
    }

    // Update school
    $school_year->school_id = $data->school_id;
    $school_year->sy_start = $data->sy_start;
    $school_year->sy_end = $data->sy_end;

    if ($school_year->create()) {
        echo json_encode(
            array('result' => 1, 'message' => 'school year created')
        );
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'failed to create school year')
        );
    }

