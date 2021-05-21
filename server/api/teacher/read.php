<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Teacher.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate object
    $teacher = new Teacher($db);

    if ( !isset($_GET['school_id']) ){
        echo json_encode(
            array('result' => 0, 'message' => 'missing id')
        );
        return;
    }


    $teacher->school_id = $_GET['school_id'];
    $result = $teacher->read();
    $num = $result->rowCount();

    if ($num > 0) {
        $teachers_arr = array();
        $teachers_arr['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $teacher_item = array(
                'id' =>  $id,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'middlename' => $middlename,
                'email' => $email,
                'phone_no' => $phone_no
            );
            array_push($teachers_arr['data'], $teacher_item);
        }
        echo json_encode($teachers_arr);
    } else {
        echo json_encode(
            array('message' => 'No teachers Found')
        );
    } 