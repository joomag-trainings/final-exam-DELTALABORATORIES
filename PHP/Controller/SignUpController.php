<?php
 namespace Conntroller;

 use \Slim\Http\Response;
 use \Slim\Container;

class SignUpController
{
    /**
     * Container
     * @var
     */
     private $container;

    /**
     * SignUpController constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }
    public function test(\Slim\Http\Request $request, Response $SlimResponse){
        $secret = '6LdurCwUAAAAALu6az4MTzFIG4NlTJVg8l9Hdeqq';
        $response = $_POST['g-recaptcha-response'];
        $remoteip = $_SERVER['REMOTE_ADDR'];

        $GoogleURL = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret .'&response=' . $response .'&remoteip=' . $remoteip);

        $GoogleResponse =  json_decode($GoogleURL, TRUE);

        if ($GoogleResponse['success'] == true){
            require '../config/db.config.php';

            $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $password = $_POST['logUpPassword'];
            $options = [
                'cost'=>12,
            ];

            $passwordHash = password_hash($password, PASSWORD_BCRYPT, $options);

            $sql = 'INSERT INTO `user_data`(`name`, `last_name`, `username`, `e_mail`, `password_hash`, `registration_date`) VALUES ("'. $_POST['logUpName'] .'", "'. $_POST['logUpLastName'] .'", "'. $_POST['logUpUsername'] .'", "'. $_POST['logUpEmail'] .'", "'. $passwordHash .'", "'. date("Y-m-d H:i:s") .'" )';

            $result = $conn->query($sql);

            header('Location:../../../index.html');
            die('Here');
        }
        else{
            echo header('Location:../../../SignUp_page.html');
        }
    }
}