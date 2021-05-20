<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/School.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate user object
    $school = new School($db);


    if ( !isset($_GET['id']) ){
        echo json_encode(
            array('result' => 0, 'message' => 'missing id')
        );
    }

    $school->id = $_GET['id'];
    $result = $school->read_one();

    if ($result->rowCount()) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $response = array(
            'barangay' => $barangay,
            'city' => $city,
            'province' => $province,
            'country' => $country,
            'postal_code' => $postal_code,
            'principal_fn' => $principal_fn,
            'principal_ln' => $principal_ln,
            'principal_mn' => $principal_mn,
            'school_name' => $school_name,
        );
    
        echo json_encode($response);
    } else {
        echo json_encode(
            array('result' => 0, 'message' => 'not found')
        );
    }

