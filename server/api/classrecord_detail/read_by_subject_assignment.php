<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Classrecord_Detail.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate object
    $classrecord_detail = new Classrecord_Detail($db);

    if ( !isset($_GET['subject_assignment_id']) || !isset($_GET['quarter'])  ){
        echo json_encode(
            array('result' => 0, 'message' => 'missing id')
        );
        return;
    }

    $result = $classrecord_detail->read_by_subject_assignment($_GET['subject_assignment_id'], $_GET['quarter']);
    $num = $result->rowCount();

    if ($num > 0) {

        $row = $result->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $item = array(
            'id' => $id,
            'written_weight' =>  $written_weight,
            'performance_weight' =>  $performance_weight,
            'quarterly_weight' => $quarterly_weight,
            'hw1' => $hw1,
            'hw2' => $hw2,
            'hw3' => $hw3,
            'hw4' => $hw4,
            'hw5' => $hw5,
            'hw6' => $hw6,
            'hw7' => $hw7,
            'hw8' => $hw8,
            'hw9' => $hw9,
            'hw10' => $hw10,
            'hp1' => $hp1,
            'hp2' => $hp2,
            'hp3' => $hp3,
            'hp4' => $hp4,
            'hp5' => $hp5,
            'hp6' => $hp6,
            'hp7' => $hp7,
            'hp8' => $hp8,
            'hp9' => $hp9,
            'hp10' => $hp10,
            'hq1' => $hq1
        );
        echo json_encode($item);
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'data found')
        );
    } 