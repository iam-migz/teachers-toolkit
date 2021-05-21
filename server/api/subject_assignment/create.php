<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Subject_Assignment.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate model
    $subject_assignment = new Subject_Assignment($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    if ( 
        !isset($data->section_id) ||
        !isset($data->subject_id) ||
        !isset($data->teacher_id) ||
        !isset($data->school_year_id) 
    ){
        echo json_encode( array("result" => 0, "message" => "incomplete data") );
        return;
    }

    // Update school
    $subject_assignment->section_id = $data->section_id;
    $subject_assignment->subject_id = $data->subject_id;
    $subject_assignment->teacher_id = $data->teacher_id;
    $subject_assignment->school_year_id = $data->school_year_id;

    if ($subject_assignment->create()) {
        echo json_encode(
            array('result' => 1, 'message' => 'subject assignment created')
        );
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'failed to create subject assignment')
        );
    }

