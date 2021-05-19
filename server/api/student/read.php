<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Student.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate object
    $student = new Student($db);

    $result = $student->read();
    $num = $result->rowCount();

    if ($num > 0) {
        $students_arr = array();
        $students_arr['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $student_item = array(
                'user_id' =>  $user_id,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'middlename' => $middlename
            );
            array_push($students_arr['data'], $student_item);
        }
        echo json_encode($students_arr);
    } else {
        echo json_encode(
            array('message' => 'No students Found')
        );
    } 