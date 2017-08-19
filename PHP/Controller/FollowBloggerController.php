<?php

namespace Conntroller;


class FollowBloggerController
{
    private $container;

    /**
     * FollowBloggerController constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function FollowBlogger(){
        session_start();

        require '../config/db.config.php';

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if($_SESSION['id'] == $_POST['blogger_id'] ){
            echo '<script>
               alert(' . '"You Cannot Follow Yourself"' .');
          </script>';
        }

        $sql = 'INSERT INTO `follower_data`(`follower_id`, `blogger_id`) VALUES ("'. $_SESSION['id'] .'","'. $_POST['blogger_id'] .'")';

        $result = $conn->query($sql);

        header('Location:../../View/Timeline_page.php');
        die('Here');
    }
}