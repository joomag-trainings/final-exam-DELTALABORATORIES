<?php
session_start();

require '../config/db.config.php';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `name`, `last_name` ,`id` , `registration_date` , `work_place` , `e_mail` , `profile_image_path` FROM `user_data` WHERE `name` = '" . $_POST['bloggerSearch'] . "' || `last_name` = '" . $_POST['bloggerSearch'] . "' ";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Search Results | Delta</title>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Audiowide|Black+Ops+One|Dancing+Script|Playball" rel="stylesheet">
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../../Styles/SearchResults_page.css" rel="stylesheet"/>

</head>
<body>

<div class="Main">
    <?php
    require('presets/navbar.php')
    ?>
    <div class="col-lg-10 col-md-10 col-sm-12 DivMainRight">
        <div class="Posts col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <?php
            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                    $sql1 = 'SELECT `follower_id`, `blogger_id` FROM `follower_data` WHERE `blogger_id` = "'. $row['id'] .'"';
                    $result1 = $conn->query($sql1);
                    $i = 0;
                    if ($result1->num_rows>0){
                        while ($row1 = $result1->fetch_assoc());
                        $i++;
                    }
                    echo '<div class="Post">
                <div class="PostContent">
                    <img src="../../' . $row['profile_image_path'] . '" class="PostMainImage">
                    <div class="TextContainer">
                        <p class="PostTitle">
                           ' . $row['name'] . ' ' . $row['last_name'] . ' <br>
                        </p>
                        <p class="PostText">
                            <strong>Works At: </strong> ' . $row['work_place'] . '
                        </p>
                        <p class="PostText">
                            <strong>Member of DELTA Blog Since: </strong>' . $row['registration_date'] . '
                        </p>
                        <p class="PostText">
                            <strong>Contact Information:</strong> ' . $row['e_mail'] . '
                        </p>
                        <p class="PostText">
                            <strong>Followers:</strong> ' . $i . '
                        </p>
                        <form action="../Controller/FollowBloggerController.php" method="POST">
                        <input name="blogger_id" value="'. $row['id'] .'" style="visibility: hidden;"/>
                         <button class="btn btn-primary" style="float: left" type="submit">
                               Follow
                        </button>
                        </form>
                    </div>
                </div>';
                }
            } else {
                echo ' <p class="PostText" style="float: none; margin-top:20px;" >
                            <strong>No Bloggers Have Been Found </strong>
                        </p>';
            }
            ?>
            </div>
        </div>
</div>
<script src="../../JavaScript/MakePostHandler.js"></script>
<script src="https://use.fontawesome.com/977e6baa13.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>
</html>