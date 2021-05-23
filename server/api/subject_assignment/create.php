<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Subject_Assignment.php';
    include_once '../../models/Subject_Data.php';
    include_once '../../models/Student_Assignment.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate models
    $subject_assignment = new Subject_Assignment($db);
    $subject_data = new Subject_Data($db);
    $student_assignment = new Student_Assignment($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    if ( 
        !isset($data->section_id) ||
        !isset($data->subject_id) ||
        !isset($data->teacher_id)
    ){
        echo json_encode( array("result" => 0, "message" => "incomplete data") );
        return;
    }

    // create subject assignment
    $subject_assignment->section_id = $data->section_id;
    $subject_assignment->subject_id = $data->subject_id;
    $subject_assignment->teacher_id = $data->teacher_id;


    if ($subject_assignment_id = $subject_assignment->create()) {

        // create subject data, for each student in the section
        // get the id's of the students
        $student_assignment->section_id = $data->section_id;
        $result = $student_assignment->read_by_section();
        $arr = array();
        $index = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $arr[$index++] = $id; 
        }
        // loop arr
        foreach($arr as $id){
            $subject_data->subject_assignment_id = $subject_assignment_id;
            $subject_data->student_id = $id;
            $subject_data->grade_id = 69;
            $subject_data->attendance_id = 720;
            $subject_data->create();
        }


        echo json_encode(
            array('result' => 1, 'message' => 'good')
        );
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'failed to create subject assignment, check if subject is already assign to this section')
        );
    }

