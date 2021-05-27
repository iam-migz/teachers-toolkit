<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Classrecord.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate object
    $classrecord = new Classrecord($db);

    if ( !isset($_GET['student_id']) || !isset($_GET['quarter'])  ){
        echo json_encode(
            array('result' => 0, 'message' => 'missing id')
        );
        return;
    }

    $result = $classrecord->read_student_grades($_GET['student_id'], $_GET['quarter']);
    $num = $result->rowCount();

    if ($num > 0) {
        $arr = array();
        $arr['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $item = array(
                'student_id' =>  $student_id,
                'student_name' =>  $student_name,
                'section_name' => $section_name,
                'strand' => $strand,
                'track' => $track,
                'grade' => $grade,
                'subject_name' => $subject_name,
                'w1' => $w1,
                'w2' => $w2,
                'w3' => $w3,
                'w4' => $w4,
                'w5' => $w5,
                'w6' => $w6,
                'w7' => $w7,
                'w8' => $w8,
                'w9' => $w9,
                'w10' => $w10,
                'p1' => $p1,
                'p2' => $p2,
                'p3' => $p3,
                'p4' => $p4,
                'p5' => $p5,
                'p6' => $p6,
                'p7' => $p7,
                'p8' => $p8,
                'p9' => $p9,
                'p10' => $p10,
                'q1' => $q1
            );
            array_push($arr['data'], $item);
        }
        echo json_encode($arr);
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'data found')
        );
    } 