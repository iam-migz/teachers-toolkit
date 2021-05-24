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

    if ( !isset($_GET['id']) ){
        echo json_encode(
            array('result' => 0, 'message' => 'missing id')
        );
        return;
    }


    $school_year->id = $_GET['id'];
    $result = $school_year->read_one();
    $num = $result->rowCount();

    if ($num > 0) {

        $row = $result->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $sy_item = array(
            'id' =>  $id,
            'sy_start' => $sy_start,
            'sy_end' => $sy_end
        );
        echo json_encode($sy_item);
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'No teachers Found')
        );
    } 