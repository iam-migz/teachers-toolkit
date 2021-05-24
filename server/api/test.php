<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../config/Database.php';
    include_once '../models/Classrecord.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate model
    $Classrecord = new Classrecord($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    $Classrecord->subject_data_id = 1;
    $Classrecord->quarter = 1;

    if ($Classrecord->create()) {
        echo json_encode(
            array('result' => 1, 'message' => 'Classrecord created')
        );
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'failed to create Classrecord, ')
        );
    }

