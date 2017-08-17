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
          $sql = 'INSERT INTO `post_data`(`id`, `posters_name`, `creation_date`, `post_title`, `post_content`) VALUES ("'. $_SESSION['id'] .'","'. $_SESSION['name'] . ' ' .$_SESSION['lastName'] .'","'. date("Y-m-d H:i:s")  .'","'. $_POST['post_title'] .'","'. $_POST['post_content'] .'")';

          $result = $conn->query($sql);

          var_dump($result);

          echo $_POST['post_content'];
          echo \mysqli_error($conn);
          $sql = 'SELECT `post_content` FROM `post_data`';

          $result = $conn->query($sql);

          $row = $result->fetch_assoc();

      echo  '<p>'. htmlentities(stripslashes($row['post_content'])).'</p>';
    }

}