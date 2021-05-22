<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Student_Assignment.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate model
    $student_assignment = new Student_Assignment($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    if ( !isset($data->section_id) ||!isset($data->student_id) ){
        echo json_encode( array("result" => 0, "message" => "incomplete data") );
        return;
    }

    // Update school
    $student_assignment->section_id = $data->section_id;
    $student_assignment->student_id = $data->student_id;

    if ($student_assignment->create()) {
        echo json_encode(
            array('result' => 1, 'message' => 'student_assignment created')
        );
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'failed to create student_assignment, check if subject is already assign to this section')
        );
    }

