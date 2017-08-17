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

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = 'UPDATE `post_data` SET `post_title`="'. $_POST['post_title'] .'",`post_content`="'. $_POST['post_content'] .'" WHERE `post_id` = "'. $_POST['EditPost'] .'"';

        $result = $conn->query($sql);

        header("location:../../View/MyBlog_page.php");
        die('Here');

    }

}