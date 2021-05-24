<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Subject.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate object
    $subject = new Subject($db);

    if ( !isset($_GET['id']) ){
        echo json_encode(
            array('result' => 0, 'message' => 'missing id')
        );
        return;
    }


    $subject->id = $_GET['id'];
    $result = $subject->read_one();
    $num = $result->rowCount();

    if ($num > 0) {

        $row = $result->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $sy_item = array(
            'id' =>  $id,
            'school_year_id' => $school_year_id,
            'semester' => $semester,
            'hours' => $hours,
            'subject_name' => $subject_name
        );
        echo json_encode($sy_item);
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'No teachers Found')
        );
    } 