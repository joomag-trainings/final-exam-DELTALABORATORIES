<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 8/20/2017
 * Time: 12:40 AM
 */

namespace Conntroller;


class MakeCommentController
{
    private $container;

    /**
     * MakeCommentController constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function MakeComment()
    {
        session_start();

        require '../config/db.config.php';

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = 'INSERT INTO `comment_data`(`comment_creator_id`, `refering_post_id`, `comment_creator_name`, `comment_content` , `date`)
                VALUES ("' . $_SESSION['id'] . '","' . $_POST['refering_post_id'] . '","' . $_SESSION['name'] . ' ' . $_SESSION['lastName'] . '",\'"' . $_POST['comment_content'] . '"\' , "' . date("Y-m-d H:i:s") . '")';

        $result = $conn->query($sql);

        header('Location:../../View/Timeline_page.php');
        die('Here');
    }


}