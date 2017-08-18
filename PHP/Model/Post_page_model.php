<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 8/19/2017
 * Time: 12:52 AM
 */

namespace Model;


class Post_page_model
{
    private $postID;

    /**
     * @return mixed
     */
    public function getPostID()
    {
        return $this->postID;
    }

    /**
     * @param mixed $postID
     */
    public function setPostID($postID)
    {
        $this->postID = $postID;
    }

    public function Post(){
        require '../config/db.config.php';

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql =  'SELECT `post_id`, `id`, `posters_name`, `creation_date`, `post_title`, `post_content` , `post_image_path` FROM `post_data` WHERE `post_id` = "'. $this->getPostID() .'"';
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();

                echo '<div class="Post">
    <div class="PostHeader">
        <p class="PostProfileName">
            ' . $row['posters_name'] . ' | ' . $row['creation_date'] . '
        </p>
    </div>
        <img src="../../'. $row['post_image_path'] .'" class="PostMainImage">
        <div class="TextContainer">
            <p class="PostTitle">
                ' . $row['post_title'] . '
            </p>
        </div>
        <div class="PostText"> ' . $row['post_content'] . '
        </div>
</div>';
            }
            else {
            echo '
             <p class="PostText"> This Post Was Not Found </br> Please try Laters
                        </p>';
            }
        }

}