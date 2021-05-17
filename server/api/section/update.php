<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Section.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate model
    $section = new Section($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    if ( 
        !isset($data->id) ||
        !isset($data->advisor_id) ||
        !isset($data->section_name) ||
        !isset($data->strand) ||
        !isset($data->track) ||
        !isset($data->grade) 
    ){
        echo json_encode( array("result" => 0, "message" => "incomplete data") );
        return;
    }

    // Update school
    $section->id = $data->id;
    $section->advisor_id = $data->advisor_id;
    $section->section_name = $data->section_name;
    $section->strand = $data->strand;
    $section->track = $data->track;
    $section->grade = $data->grade;

    if ($section->update()) {
        echo json_encode(
            array('result' => 1, 'message' => 'section updated')
        );
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'failed to update section')
        );
    }

