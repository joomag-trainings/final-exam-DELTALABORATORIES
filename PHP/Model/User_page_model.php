<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 8/20/2017
 * Time: 4:08 PM
 */

namespace Model;


class User_page_model
{
    public function UserPage (){

        require '../config/db.config.php';

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //Get The User

        $sql =  'SELECT `post_id`, `id`, `posters_name`, `creation_date`, `post_title`, `post_content` , `post_image_path` FROM `post_data` WHERE `id` = "'. $_SESSION['requestedUser'] .'" ORDER BY `post_id` DESC ';
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                echo '<div class="Post">
                <div class="PostHeader">
                    <p class="PostProfileName">
                       ' . $row['posters_name'] . ' | ' . $row['creation_date'] . '
                    </p>
                </div>
                <div class="PostContent">
                    <img src="../../'. $row['post_image_path'] .'" class="PostMainImage">
                    <div class="TextContainer">
                        <p class="PostTitle">
                           ' . $row['post_title'] . '
                        </p>
                        <div class="PostText"> ' . $post_content = substr($row['post_content'], 0 , 495) . ' ... ' . '
                        </div>
                         <form action="../View/Post_page.php" method="post">
                            <button class="btn btn-primary ReadMore" type="submit" name="postID" value="'. $row['post_id'] .'">Read More &rarr;</button>
                            </form>
                    </div>
                </div>
            </div>';
            }
        }
    }
}