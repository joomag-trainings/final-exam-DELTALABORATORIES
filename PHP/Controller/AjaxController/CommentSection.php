<?php
session_start();

require '../../config/db.config.php';

$conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$postID = $_GET['post'];

$sql = 'INSERT INTO `comment_data`(`comment_creator_id`, `refering_post_id`, `comment_creator_name`, `comment_content`)
                VALUES ("'. $_SESSION['id'] .'","'. $postID .'","'. $_SESSION['name'] . ' ' .$_SESSION['lastName'] .'","'. $_POST['comment_content'] .'")';

$result = $conn->query($sql);

echo 'hello';

