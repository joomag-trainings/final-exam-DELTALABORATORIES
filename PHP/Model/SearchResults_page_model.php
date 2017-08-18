<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 8/18/2017
 * Time: 2:05 PM
 */

namespace Model;


class SearchResults_page_model
{

    public function SearchResults()
    {
        require '../config/db.config.php';

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $bloggerData = "SELECT `name`, `last_name` ,`id` , `registration_date` , `work_place` , `e_mail` , `profile_image_path` FROM `user_data` WHERE `name` = '" . $_POST['bloggerSearch'] . "' || `last_name` = '" . $_POST['bloggerSearch'] . "' ";
        $bloggerDataResult = $conn->query($bloggerData);

        if ($bloggerDataResult->num_rows > 0) {

            while ($row = $bloggerDataResult->fetch_assoc()) {

                $postData = 'SELECT `id` FROM `post_data` WHERE `id` = "' . $row['id'] . '"';

                $postDataResult = $conn->query($postData);

                if ($postDataResult->num_rows > 0) {


                    $followerData = 'SELECT `follower_id`, `blogger_id` FROM `follower_data` WHERE `blogger_id` = "' . $row['id'] . '"';
                    $followerDataResult = $conn->query($followerData);

                    $followerNumber = 0;

                    if ($followerDataResult->num_rows > 0) {
                        while ($row1 = $followerDataResult->fetch_assoc()) {
                            $followerNumber++;
                        };
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
                            <strong>Followers:</strong> ' . $followerNumber . '
                        </p>
                        <form action="../Controller/FollowBloggerController.php" method="POST">
                        <input name="blogger_id" value="' . $row['id'] . '" style="visibility: hidden;"/>
                         <button class="btn btn-primary" style="float: left" type="submit">
                               Follow
                        </button>
                        </form>
                    </div>
                </div>';
                }
        else {
                echo ' <p class="PostText" style="float: none; margin-top:20px;" >
                            <strong>No Bloggers Have Been Found </strong>
                        </p>';
            }


            }
        }
    }
}