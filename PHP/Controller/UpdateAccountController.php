<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 8/19/2017
 * Time: 12:20 PM
 */

namespace Conntroller;


class UpdateAccountController
{

    private $container;

    /**
     * @return mixed
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param mixed $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    public function UpdateAccount(){

        session_start();

        require '../config/db.config.php';

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $ImageSaver = new ImageUploadController();
        $ImageSaver->ImageUploadController();

        $imagePath = $ImageSaver->getImagePath();


        if ($imagePath == ''){
            $sql = 'UPDATE `user_data` 
                SET `name`="'. $_POST['name'] .'",`last_name`="'. $_POST['last_name'] .'", `username` = "'. $_POST['username'] .'" , `work_place` = "'. $_POST['work_place'] .'"
                WHERE `id` = "'. $_SESSION['id'] .'"';

            $result = $conn->query($sql);
        }
        else{
            $sql = 'UPDATE `user_data` 
                SET `name`="'. $_POST['name'] .'",`last_name`="'. $_POST['last_name'] .'", `username` = "'. $_POST['username'] .'" , `work_place` = "'. $_POST['work_place'] .'",`profile_image_path` = "'. $imagePath .'"
                WHERE `id` = "'. $_SESSION['id'] .'"';

            $result = $conn->query($sql);
        }

        header('Location:../../View/Timeline_page.php');
        die('Here');
    }

}