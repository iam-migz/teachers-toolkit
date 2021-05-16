<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/User.php';
    include_once '../../models/Admin.php';
    include_once '../../models/School.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate model
    $school = new School($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    if ( 
        !isset($data->id) ||
        !isset($data->address) ||
        !isset($data->barangay) ||
        !isset($data->city) ||
        !isset($data->province) ||
        !isset($data->country) ||
        !isset($data->postal_code) ||
        !isset($data->principal_fn) ||
        !isset($data->principal_ln) ||
        !isset($data->principal_mn) ||
        !isset($data->school_name) 
    ){
        echo json_encode( array("result" => 0, "message" => "incomplete data") );
        return;
    }

    // Update school
    $school->id = $data->id;
    $school->address = $data->address;
    $school->barangay = $data->barangay;
    $school->city = $data->city;
    $school->province = $data->province;
    $school->country = $data->country;
    $school->postal_code = $data->postal_code;
    $school->principal_fn = $data->principal_fn;
    $school->principal_ln = $data->principal_ln;
    $school->principal_mn = $data->principal_mn;
    $school->school_name = $data->school_name;

    if ($school->update()) {
        echo json_encode(
            array('result' => 1, 'message' => 'school updated')
        );
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'failed to update')
        );
    }

