<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 8/21/2017
 * Time: 2:35 PM
 */

namespace Conntroller;


class DeleteCommentController
{
    public function DeleteComment()
    {
        session_start();
        require '../config/db.config.php';

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = 'DELETE FROM `comment_data` WHERE `comment_creator_id` = "' . $_SESSION['id'] . '" && `comment_id` = "' . $_POST['CommentID'] . '"';
        $result = $conn->query($sql);

        var_dump($result);
        /*header('Location:../../View/MyBlog_page.php');
        die('Here');*/
    }

}