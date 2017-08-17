<?php
require '../config/db.config.php';

$conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql ='DELETE FROM `post_data` WHERE `post_data`.`post_id` = "'. $_POST['post_delete'] .'"';
$result = $conn->query($sql);

header('Location:../View/MyBlog_page.php');
die('Here');