<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/User.php';

    // Instantiate a DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate user object
    $user = new User($db);

    // GET ID
    $user->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get post
    $user->read_single();

    $userr_arr = array(
        'id' => $user->id,
        'username' => $user->username,
        'password' => $user->password,
        'access' => $user->access,
    );

    // Make JSON
    print_r(json_encode($userr_arr));