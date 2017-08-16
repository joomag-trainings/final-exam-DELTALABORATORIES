<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 8/15/2017
 * Time: 12:00 AM
 */

namespace Conntroller;

use \Slim\Http\Response;
use \Slim\Container;

class SignInController
{
    /**
     * @var
     * Container
     */

    private $container;

    /**
     * SignInController constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function SignInController(\Slim\Http\Request $request, Response $response){
        require '../config/db.config.php';

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo $_POST['logInEmail'];
        $sql = "SELECT `name`,`last_name`,`id`,`username`,`e_mail`,`password_hash`, `profile_image_path`,`registration_date` FROM `user_data` WHERE `e_mail` = '" . $_POST['logInEmail'] . "'";

        $result = $conn->query($sql);

        if ($result->num_rows == 0){
            echo 'Invalid E-Mail';
        }

        $data = $result->fetch_assoc();

        $inputPassword = $_POST['logInPassword'];

        var_dump(password_verify($inputPassword, $data['password_hash']));
        if (password_verify($inputPassword, $data['password_hash']) === true){
            session_start();
            $_SESSION['name'] = $data['name'];
            $_SESSION['lastName'] = $data['last_name'];
            $_SESSION['Username'] = $data['username'];
            $_SESSION['profileImage'] = $data['profile_image_path'];
            $_SESSION['id'] = $data['id'];
            $_SESSION['loggedIn'] = 1;
            header('Location:../../View/Timeline_page.php');
            die('Here');
        }

        else{
            header('Location:../../../index.html');
            die('Here');
        }
    }
}