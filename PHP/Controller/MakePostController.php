<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 8/15/2017
 * Time: 8:34 PM
 */

namespace Conntroller;

use \Slim\Http\Response;
use \Slim\Container;

class MakePostController
{
    /**
     * @var
     * Container
     */

    private $container;

    /**
     * MakePostController constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function MakePostController(){
        session_start();

        require '../config/db.config.php';

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_POST['Save'])){
            $ImageSaver = new ImageUploadController();
            $ImageSaver->ImageUploadController();

            $imagePath = $ImageSaver->getImagePath();


            if ($imagePath == ''){
                $imagePath = 'Images/Post_Pictures_default/post_image_deafault.jpg';
                echo $imagePath;
            }


            $sql = 'INSERT INTO `post_data`(`id`, `posters_name`, `creation_date`, `post_title`, `post_content` , `post_image_path` , `posted`) VALUES ("'. $_SESSION['id'] .'","'. $_SESSION['name'] . ' ' .$_SESSION['lastName'] .'","'. date("Y-m-d H:i:s")  .'","'. $_POST['post_title'] .'","'. $_POST['post_content'] .'","'. $imagePath .'" , 0)';

            $result = $conn->query($sql);

            header('Location:../../View/MyBlog_page.php');
            die('Here');
        }
        else if (isset($_POST['Publish'])) {
            $ImageSaver = new ImageUploadController();
            $ImageSaver->ImageUploadController();

            $imagePath = $ImageSaver->getImagePath();


            if ($imagePath == ''){
                $imagePath = 'Images/Post_Pictures_default/post_image_deafault.jpg';
                echo $imagePath;
            }

            $sql = 'INSERT INTO `post_data`(`id`, `posters_name`, `creation_date`, `post_title`, `post_content` , `post_image_path`, `posted`) VALUES ("'. $_SESSION['id'] .'","'. $_SESSION['name'] . ' ' .$_SESSION['lastName'] .'","'. date("Y-m-d H:i:s")  .'","'. $_POST['post_title'] .'","'. $_POST['post_content'] .'","'. $imagePath .'" , 1)';

            $result = $conn->query($sql);

            header('Location:../../View/MyBlog_page.php');
            die('Here');
        }

    }
}

