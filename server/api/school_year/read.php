<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/School_Year.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate object
    $school_year = new School_Year($db);

    if ( !isset($_GET['school_id']) ){
        echo json_encode(
            array('result' => 0, 'message' => 'missing id')
        );
        return;
    }


    $school_year->school_id = $_GET['school_id'];
    $result = $school_year->read();
    $num = $result->rowCount();

    if ($num > 0) {
        $sy_arr = array();
        $sy_arr['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $sy_item = array(
                'id' =>  $id,
                'sy_start' => $sy_start,
                'sy_end' => $sy_end
            );
            array_push($sy_arr['data'], $sy_item);
        }
        echo json_encode($sy_arr);
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'No teachers Found')
        );
    } 