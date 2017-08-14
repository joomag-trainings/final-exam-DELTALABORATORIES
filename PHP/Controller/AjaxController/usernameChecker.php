<?php
require '../../config/db.config.php';

$conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $username = $_POST['Username'];

     $sql = 'SELECT `username` FROM `user_data` WHERE `username` = "' . $username . '"';

     $result = $conn->query($sql);

     if ($result->num_rows > 0){
         echo json_encode('This Username is Already in Use');
     }



