<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Student.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate model
    $student = new Student($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    if ( 
        !isset($data->id) ||
        !isset($data->completed) ||
        !isset($data->continuing) ||
        !isset($data->firstname) ||
        !isset($data->lastname) ||
        !isset($data->middlename) ||
        !isset($data->email) ||
        !isset($data->province) ||
        !isset($data->city) ||
        !isset($data->barangay) ||
        !isset($data->gender) ||
        !isset($data->LRN) ||
        !isset($data->birthdate)
    ){
        echo json_encode( array("result" => 0, "message" => "incomplete data") );
        return;
    }

    $student->id = $data->id;
    $student->completed = $data->completed;
    $student->continuing = $data->continuing;
    $student->firstname = $data->firstname;
    $student->lastname = $data->lastname;
    $student->middlename = $data->middlename;
    $student->email = $data->email;

    $student->province = $data->province;
    $student->city = $data->city;
    $student->barangay = $data->barangay;
    $student->gender = $data->gender;
    $student->LRN = $data->LRN;
    $student->birthdate =$data->birthdate;

    if ($student->update()) {
        echo json_encode(
            array('result' => 1, 'message' => 'student updated')
        );
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'failed to update student')
        );
    }

