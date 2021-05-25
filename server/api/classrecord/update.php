<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Classrecord.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate model
    $cr = new Classrecord($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    if ( 

        !isset($data->id) ||
        !isset($data->q1) ||
        !isset($data->w1) ||
        !isset($data->w2) ||
        !isset($data->w3) ||
        !isset($data->w4) ||
        !isset($data->w5) ||
        !isset($data->w6) ||
        !isset($data->w7) ||
        !isset($data->w8) ||
        !isset($data->w9) ||
        !isset($data->w10) ||
        !isset($data->p1) ||
        !isset($data->p2) ||
        !isset($data->p3) ||
        !isset($data->p4) ||
        !isset($data->p5) ||
        !isset($data->p6) ||
        !isset($data->p7) ||
        !isset($data->p8) ||
        !isset($data->p9) ||
        !isset($data->p10)
    ){
        echo json_encode( array("result" => 0, "message" => "incomplete data") );
        return;
    }

    // Update 
    $cr->id = $data->id;
    $cr->q1 = $data->q1;

    $cr->w1 = $data->w1;
    $cr->w2 = $data->w2;
    $cr->w3 = $data->w3;
    $cr->w4 = $data->w4;
    $cr->w5 = $data->w5;
    $cr->w6 = $data->w6;
    $cr->w7 = $data->w7;
    $cr->w8 = $data->w8;
    $cr->w9 = $data->w9;
    $cr->w10 = $data->w10;

    $cr->p1 = $data->p1;
    $cr->p2 = $data->p2;
    $cr->p3 = $data->p3;
    $cr->p4 = $data->p4;
    $cr->p5 = $data->p5;
    $cr->p6 = $data->p6;
    $cr->p7 = $data->p7;
    $cr->p8 = $data->p8;
    $cr->p9 = $data->p9;
    $cr->p10 = $data->p10;


    if ($cr->update()) {
        echo json_encode(
            array('result' => 1, 'message' => 'cr updated')
        );
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'failed to update cr')
        );
    }

