<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/School_Record.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate model
    $school_record = new School_Record($db);

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
    $school_record->section_id = $data->section_id;
    $school_record->subject_id = $data->subject_id;
    $school_record->teacher_id = $data->teacher_id;
    $school_record->school_year_id = $data->school_year_id;

    if ($school_record->create()) {
        echo json_encode(
            array('result' => 1, 'message' => 'school record created')
        );
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'failed to create school record')
        );
    }

