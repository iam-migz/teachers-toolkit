<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    if ( !isset($_GET['section_id']) ){
        echo json_encode(
            array('result' => 0, 'message' => 'missing id')
        );
        return;
    }
  


    // $response = file_get_contents('http://localhost/teachers-toolkit-app/server/api/subject/read_by_section.php?section_id='.$_GET['section_id']);
    // $subjects = json_decode($response, true);
    // $subjects = $subjects['data'];
    // print_r($subjects);


    
    $response = file_get_contents('http://localhost/teachers-toolkit-app/server/api/student_assignment/read_by_section.php?section_id='.$_GET['section_id']);
    $students = json_decode($response, true);
    $students = $students['data'];
    $array = [];
    foreach($students as $stud) {
       
        $response = file_get_contents('http://localhost/teachers-toolkit-app/server/api/grades/student_grades.php?student_id='.$stud['id']);
        $student_grade = json_decode($response, true);
        array_push($array, $student_grade);
    }
    // print_r($array);
    print_r($students);