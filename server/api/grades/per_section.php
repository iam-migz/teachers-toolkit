<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    if ( !isset($_GET['section_id']) || !isset($_GET['school_year_id']) ){
        echo json_encode(
            array('result' => 0, 'message' => 'missing id')
        );
        return;
    }
  



    $response = file_get_contents('http://localhost/teachers-toolkit-app/server/api/classrecord/read_student_grades.php?student_id='.$_GET['student_id']);
    $student_data = json_decode($response, true);

    $student_data = $student_data['data'];
    $student_grade = [];
