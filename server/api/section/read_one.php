<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Section.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate object
    $section = new Section($db);

    if ( !isset($_GET['id']) ){
        echo json_encode(
            array('result' => 0, 'message' => 'missing id')
        );
        return;
    }


    $section->id = $_GET['id'];
    $result = $section->read_one();
    $num = $result->rowCount();

    if ($num > 0) {
        $row = $result->fetch(PDO::FETCH_ASSOC);

        extract($row);
        $item = array(
            'id' =>  $id,
            'advisor_id' =>  $advisor_id,
            'strand' =>  $strand,
            'track' =>  $track,
            'grade' =>  $grade,
            'section_name' => $section_name
        );

        echo json_encode($item);
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'No data Found')
        );
    } 