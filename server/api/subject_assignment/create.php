<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Subject_Assignment.php';
    include_once '../../models/Subject_Data.php';
    include_once '../../models/Student_Assignment.php';
    include_once '../../models/Classrecord.php';
    include_once '../../models/Classrecord_Detail.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate models
    $subject_assignment = new Subject_Assignment($db);
    $subject_data = new Subject_Data($db);
    $student_assignment = new Student_Assignment($db);
    $classrecord = new Classrecord($db);
    $classrecord_detail = new Classrecord_Detail($db);

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


    if ($subject_assignment->create()) {

        // create subject data, for each student in the section
        // read students by section
        $student_assignment->section_id = $data->section_id;
        $result = $student_assignment->read_by_section();
        $arr = array();
        $index = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $arr[$index++] = $id; 
        }

        // create subject data, classrecord for each students
        foreach($arr as $student_id){
            $subject_data->subject_assignment_id = $subject_assignment->id;
            $subject_data->student_id = $student_id;
            $subject_data->create();

            // quarter 1
            $classrecord->subject_data_id = $subject_data->id;
            $classrecord->quarter = 1;
            $classrecord->create();

            // quarter 2
            $classrecord->subject_data_id = $subject_data->id;
            $classrecord->quarter = 2;
            $classrecord->create();

        }
        
        // create classrecord detail for this subject_data
        // quarter 1
        $classrecord_detail->subject_data_id = $subject_data->id;
        $classrecord_detail->quarter = 1;
        $classrecord_detail->create(); 

        // quarter 2
        $classrecord_detail->subject_data_id = $subject_data->id;
        $classrecord_detail->quarter = 2;
        $classrecord_detail->create(); 


        echo json_encode(
            array('result' => 1, 'message' => 'good')
        );
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'failed to create subject assignment, check if subject is already assign to this section')
        );
    }

