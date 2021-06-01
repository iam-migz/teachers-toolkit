<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Student_Assignment.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate object
    $student_assignment = new Student_Assignment($db);

    if ( !isset($_GET['section_id']) ){
        echo json_encode(
            array('result' => 0, 'message' => 'missing section_id')
        );
        return;
    }

    $student_assignment->section_id = $_GET['section_id'];

    $result = $student_assignment->read_by_section();
    $num = $result->rowCount();

    if ($num > 0) {
        $arr = array();
        $arr['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $item = array(
                'id' =>  $id,
                'user_id' =>  $user_id,
                'section_id' =>  $section_id,
                'school_id' =>  $school_id,
                'section_name' =>  $section_name,
                'birthdate' =>  $birthdate,
                'LRN' =>  $LRN,
                'student_name' => $student_name,
                'email' => $email,
                'gender' => $gender,
                'address' => $address
            );
            array_push($arr['data'], $item);
        }
        echo json_encode($arr);
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'No students Found')
        );
    } 