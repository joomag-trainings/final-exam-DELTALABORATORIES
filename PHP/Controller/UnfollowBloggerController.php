<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 8/19/2017
 * Time: 3:48 PM
 */

namespace Conntroller;


class UnfollowBloggerController
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

    public function Unfollow()
    {

        session_start();
        require '../config/db.config.php';

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = 'DELETE FROM `follower_data` WHERE `follower_id` = "' . $_SESSION['id'] . '" && `blogger_id` = "' . $_POST['blogger_id'] . '"';

        $result = $conn->query($sql);

        header('Location:../../View/Following_page.php');
        die('Here');
    }
}