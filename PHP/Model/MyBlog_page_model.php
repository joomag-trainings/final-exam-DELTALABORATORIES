<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 8/17/2017
 * Time: 6:17 PM
 */

namespace Model;


class MyBlog_page_model
{
    private $posters_name;
    private $creation_date;
    private $post_title;
    private $post_content;


    public function getPosts(){

        $Delete = 'Are you Shure that you want to delete this post';
        require '../config/db.config.php';

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql =  'SELECT `post_id`, `id`, `posters_name`, `creation_date`, `post_title`, `post_content` FROM `post_data` WHERE `id` = "'. $_SESSION['id'] .'" ORDER BY `post_id` DESC ';
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                echo '<div class="Post">
                <div class="PostHeader">
                    <p class="PostProfileName">
                       ' . $row['posters_name'] . ' | ' . $row['creation_date'] . '
                    </p>
                    <form action="../Controller/DeletePost.php" method="POST" onsubmit="return confirm('. "'Are you sure you want to delete this post?'" .')">
                        <button value="' . $row['post_id'] . '" class="btn btn-danger" name="post_delete" style="margin:15px; float:right">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                        </button>
                    </form>
                    <form action="../View/EditPost_page.php" method="POST">
                        <button value="' . $row['post_id'] . '" class="btn" style="margin:15px; margin-right: 0 ; float:right;" name="edit_post">
                            <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                        </button>
                    </form>
                </div>
                <div class="PostContent">
                    <img src="../../Images/Profile_Page/Image-0.jpeg" class="PostMainImage">
                    <div class="TextContainer">
                        <p class="PostTitle">
                           ' . $row['post_title'] . '
                        </p>
                        <div class="PostText"> ' . $post_content = substr($row['post_content'], 0 , 495) . ' ... ' . '
                        </div>
                        <a href="#" class="btn btn-primary" style="float: left;">Read More &rarr;</a>
                    </div>
                </div>
            </div>';
            }
        }
    }
}