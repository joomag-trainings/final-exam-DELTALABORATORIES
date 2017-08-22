<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 8/20/2017
 * Time: 12:14 AM
 */

namespace Model;


class Comment_Section_model
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


    public function getComments()
    {

        require '../config/db.config.php';

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $commentsData = 'SELECT `comment_creator_id`, `refering_post_id`, `comment_id`, `comment_creator_name`, `comment_content` , `date` FROM `comment_data` WHERE `refering_post_id` = "' . $this->getPostID() . '" ORDER BY `comment_id` DESC';

        $result = $conn->query($commentsData);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $getUserPicture = 'SELECT `profile_image_path` FROM `user_data` WHERE `id` = "' . $row['comment_creator_id'] . '"';

                $userPictureResult = $conn->query($getUserPicture);

                echo \mysqli_error($conn);

                $UserPicture = $userPictureResult->fetch_assoc();

                if ($_SESSION['id'] == $row['comment_creator_id']) {
                    echo '<div class="Comment">
                <img src="../../' . $UserPicture['profile_image_path'] . '" class="CommentImage">
                <div style="width: 90px;float: right;">
                <form action="../public/index.php/DeleteComment" method="POST">
                <button class="btn btn-danger" name="CommentID" value="' . $row['comment_id'] . '">Delete</button>
                </form>
                </div>
                <div class="TextArea">
                    <p class="CommentName">' . $row['comment_creator_name'] . ' | ' . $row['date'] . '</p>
                    <div class="CommentContent">' . $row['comment_content'] . '</div>
                </div>
            </div>';
                } else {
                    echo '<div class="Comment">
                <img src="../../' . $UserPicture['profile_image_path'] . '" class="CommentImage">
                <div class="TextArea">
                    <p class="CommentName">' . $row['comment_creator_name'] . '</p>
                    <p class="CommentContent">' . $row['comment_content'] . '</p>
                </div>
            </div>';
                }

            }
        } else {
            echo '<p class="CommentName" style="margin-left:1%">No Comments Have Been Found</p>';
        }
    }

}