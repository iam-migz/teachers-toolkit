<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Subject_Assignment.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate object
    $subject_assignment = new Subject_Assignment($db);

    if ( !isset($_GET['teacher_id']) || !isset($_GET['school_year_id'])  ){
        echo json_encode(
            array('result' => 0, 'message' => 'missing id')
        );
        return;
    }


    $subject_assignment->teacher_id = $_GET['teacher_id'];
    $subject_assignment->school_year_id = $_GET['school_year_id'];
    $result = $subject_assignment->read_teacher_subjects();
    $num = $result->rowCount();

    if ($num > 0) {
        $arr = array();
        $arr['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $item = array(
                'subject_assignment_id' =>  $id,
                'subject_id' =>  $subject_id,
                'subject_name' => $subject_name,
                'semester' => $semester,
                'hours' => $hours,
                'section_name' => $section_name,
                'strand' => $strand,
                'track' => $track,
                'section_id' => $section_id,
                'grade' => $grade
            );
            array_push($arr['data'], $item);
        }
        echo json_encode($arr);
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'No teachers Found')
        );
    } 