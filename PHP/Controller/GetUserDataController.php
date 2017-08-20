<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 8/20/2017
 * Time: 4:51 PM
 */

namespace Conntroller;

use \Slim\Http\Request;
use \Slim\Http\Response;
class GetUserDataController
{
    private $userID;

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function getData(Request $request, Response $response)
    {
        session_start();
        $username = $request->getAttribute('username');

        require '../config/db.config.php';

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //Get The User

        $user = 'SELECT `name`, `last_name`, `id`, `username`, `e_mail`, `password_hash`, `profile_image_path`, `registration_date`, `work_place` FROM `user_data` WHERE `username` = "' . $username . '"';

        $userResult = $conn->query($user);

        $userData = $userResult->fetch_assoc();
        $this->setUserID($userData['id']);

        $_SESSION['requestedUser'] = $this->getUserID();

        header('Location:../../../View/User_page.php');
        die('Here');
    }

}