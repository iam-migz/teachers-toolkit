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



    $result = $student_assignment->read_unassigned();
    $num = $result->rowCount();

    if ($num > 0) {
        $arr = array();
        $arr['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $item = array(
                'id' =>  $id,
                'LRN' =>  $LRN,
                'name' => $name
            );
            array_push($arr['data'], $item);
        }
        echo json_encode($arr);
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'No students Found')
        );
    } 