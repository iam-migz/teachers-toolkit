<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Subject.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate model
    $subject = new Subject($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    if ( 
        !isset($data->teacher_id) ||
        !isset($data->subject_name) ||
        !isset($data->semester) ||
        !isset($data->hours) 
    ){
        echo json_encode( array("result" => 0, "message" => "incomplete data") );
        return;
    }

    // Update school
    $subject->teacher_id = $data->teacher_id;
    $subject->subject_name = $data->subject_name;
    $subject->semester = $data->semester;
    $subject->hours = $data->hours;

    if ($subject->create()) {
        echo json_encode(
            array('result' => 1, 'message' => 'subject created')
        );
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'failed to create subject')
        );
    }

