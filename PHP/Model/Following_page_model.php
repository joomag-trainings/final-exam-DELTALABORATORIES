<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 8/19/2017
 * Time: 2:07 PM
 */

namespace Model;


class Following_page
{
    public function Following()
    {
        require '../config/db.config.php';

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $followerData = 'SELECT * FROM follower_data INNER JOIN user_data ON user_data.id = follower_data.blogger_id && follower_id = "' . $_SESSION['id'] . '"';

        $followerDataResult = $conn->query($followerData);

        if ($followerDataResult->num_rows > 0) {
            while ($row = $followerDataResult->fetch_assoc()) {
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
                            <strong>Followers: 99</strong>  
                        </p>
                        <form action="../public/index.php/Unfollow" method="POST">
                        <input name="blogger_id" value="' . $row['id'] . '" style="visibility: hidden;"/>
                         <button class="btn btn-primary" name="blogger_id" style="float: left" type="submit" value="' . $row['id'] . '">
                               Unfollow
                        </button>
                        </form>
                    </div>
                </div>
                </div>';
            }
        } else {
            echo 'Follow';
        }
    }
}