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

    if ( !isset($_GET['school_year_id']) || !isset($_GET['advisor_id']) ){
        echo json_encode(
            array('result' => 0, 'message' => 'missing id')
        );
        return;
    }


    $section->school_year_id = $_GET['school_year_id'];
    $section->advisor_id = $_GET['advisor_id'];
    $result = $section->read_advisor();
    $num = $result->rowCount();

    if ($num > 0) {
        $arr = array();
        $arr['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $item = array(
                'id' =>  $id,
                'section_name' => $section_name,
                'track' => $track,
                'strand' => $strand,
                'grade' => $grade
            );
            array_push($arr['data'], $item);
        }
        echo json_encode($arr);
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'No data Found')
        );
    } 