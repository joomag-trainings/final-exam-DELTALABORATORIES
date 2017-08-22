<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 8/17/2017
 * Time: 8:58 PM
 */

namespace Conntroller;

use \Slim\Http\Response;
use \Slim\Container;

class UpdatePostController
{

    /**
     * @var
     * Container
     */
    private $container;

    /**
     * UpdatePostController constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function UpdatePostController (){

        session_start();

        require '../config/db.config.php';

        $ImageSaver = new ImageUploadController();
        $ImageSaver->ImageUploadController();

        $imagePath = $ImageSaver->getImagePath();

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $postTitle = filter_var($_POST['post_title'], FILTER_SANITIZE_STRING);
        $postContent = filter_var($_POST['post_content'], FILTER_SANITIZE_STRING);

        echo $postTitle;

        if (isset($_POST['Save'])){
            $sql = 'UPDATE `post_data` SET `post_title`="'. $postTitle .'",`post_content`="'. $postContent .'", `post_image_path` = "'. $imagePath .'" WHERE `post_id` = "'. $_POST['Save'] .'"';

            $result = $conn->query($sql);

            header("location:../../View/NotPublished_page.php");
            die('Here');
        }
        elseif (isset($_POST['Publish'])){

            $sql = 'UPDATE `post_data` SET `post_title`="'. $postTitle .'",`post_content`="'. $postContent .'", `post_image_path` = "'. $imagePath .'" , `posted` = 1 WHERE `post_id` = "'. $_POST['Publish'] .'"';

            $result = $conn->query($sql);
            echo mysqli_error($conn);

            header("location:../../View/MyBlog_page.php");
            die('Here');
        }

    }

}