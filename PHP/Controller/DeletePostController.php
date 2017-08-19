<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 8/19/2017
 * Time: 4:11 PM
 */

namespace Conntroller;


class DeletePostController
{

    private $container;

    /**
     * DeletePostController constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function DeletePost(){
        require '../config/db.config.php';

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql ='DELETE FROM `post_data` WHERE `post_data`.`post_id` = "'. $_POST['post_delete'] .'"';
        $result = $conn->query($sql);

        header('Location:../../View/MyBlog_page.php');
        die('Here');
    }

}