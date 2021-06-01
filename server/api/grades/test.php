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


    
    // $response = file_get_contents('http://localhost/teachers-toolkit-app/server/api/student_assignment/read_by_section.php?section_id='.$_GET['section_id']);
    // $students = json_decode($response, true);
    // $students = $students['data'];
    // $array = [];

    // // get section
    // $response = file_get_contents('http://localhost/teachers-toolkit-app/server/api/section/read_one.php?id='.$students[0]['section_id']);
    // $section = json_decode($response, true);
    // // print_r($section);

    // // get school
    // $response = file_get_contents('http://localhost/teachers-toolkit-app/server/api/school/read_one.php?id='.$students[0]['school_id']);
    // $school = json_decode($response, true);
    // // print_r($school);

    // foreach($students as $stud) {
       
    //     $sem1 = [];
    //     $sem2 = [];
    //     $response = file_get_contents('http://localhost/teachers-toolkit-app/server/api/grades/student_grades.php?student_id='.$stud['id']);
    //     $student_grade = json_decode($response, true);
    //     foreach($student_grade as $val) {
    //         if ($val['semester'] == 1) {
    //             array_push($sem1, $val);
    //         } else if ($val['semester'] == 2) {
    //             array_push($sem2, $val);
    //         }
    //     }
    //     echo 'sem1'; print_r($sem1);
    //     echo 'sem2'; print_r($sem2);
    // }
    // // print_r($array);
    // // print_r($students);
    

    // $response = file_get_contents('http://localhost/teachers-toolkit-app/server/api/grades/student_grades.php?student_id='.$students[0]['id']);
    // $hey = json_decode($response, true);
    
    $array = [1,2,3,4,5];
    print_r($array);

    if (isset($array[10])){
        echo "yes";
    } else {
        echo "no";
    }