<?php

require '../../config/db.config.php';

$conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $Email = $_POST['Email'];

    $sql = 'SELECT `username` FROM `user_data` WHERE `e_mail` = "' . $Email . '"';

    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        echo json_encode('This E-Mail is Already Registered In The System');
    }