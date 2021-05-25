<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Classrecord_Detail.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate model
    $crd = new Classrecord_Detail($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    if ( 

        !isset($data->id) ||
        !isset($data->performance_weight) ||
        !isset($data->written_weight) ||
        !isset($data->quarterly_weight) ||
        !isset($data->hq1) ||
        !isset($data->hw1) ||
        !isset($data->hw2) ||
        !isset($data->hw3) ||
        !isset($data->hw4) ||
        !isset($data->hw5) ||
        !isset($data->hw6) ||
        !isset($data->hw7) ||
        !isset($data->hw8) ||
        !isset($data->hw9) ||
        !isset($data->hw10) ||
        !isset($data->hp1) ||
        !isset($data->hp2) ||
        !isset($data->hp3) ||
        !isset($data->hp4) ||
        !isset($data->hp5) ||
        !isset($data->hp6) ||
        !isset($data->hp7) ||
        !isset($data->hp8) ||
        !isset($data->hp9) ||
        !isset($data->hp10)
    ){
        echo json_encode( array("result" => 0, "message" => "incomplete data") );
        return;
    }

    // Update 
    $crd->id = $data->id;

    $crd->performance_weight = $data->performance_weight;
    $crd->written_weight = $data->written_weight;
    $crd->quarterly_weight = $data->quarterly_weight;
    
    $crd->hq1 = $data->hq1;

    $crd->hw1 = $data->hw1;
    $crd->hw2 = $data->hw2;
    $crd->hw3 = $data->hw3;
    $crd->hw4 = $data->hw4;
    $crd->hw5 = $data->hw5;
    $crd->hw6 = $data->hw6;
    $crd->hw7 = $data->hw7;
    $crd->hw8 = $data->hw8;
    $crd->hw9 = $data->hw9;
    $crd->hw10 = $data->hw10;

    $crd->hp1 = $data->hp1;
    $crd->hp2 = $data->hp2;
    $crd->hp3 = $data->hp3;
    $crd->hp4 = $data->hp4;
    $crd->hp5 = $data->hp5;
    $crd->hp6 = $data->hp6;
    $crd->hp7 = $data->hp7;
    $crd->hp8 = $data->hp8;
    $crd->hp9 = $data->hp9;
    $crd->hp10 = $data->hp10;


    if ($crd->update()) {
        echo json_encode(
            array('result' => 1, 'message' => 'crd updated')
        );
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'failed to update crd')
        );
    }

