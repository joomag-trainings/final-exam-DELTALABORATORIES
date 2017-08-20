<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 8/20/2017
 * Time: 10:39 PM
 */

namespace Conntroller;


class PublishPostController
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

    public function PublishPost(){
        require '../config/db.config.php';

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql ='UPDATE `post_data`
               SET `posted`=1
               WHERE `post_id` = "'. $_POST['post_publish'] .'"';
        $result = $conn->query($sql);

        header('Location:../../View/MyBlog_page.php');
        die('Here');
    }
}