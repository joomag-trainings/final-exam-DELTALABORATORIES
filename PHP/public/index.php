<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
$container = new \Slim\Container;
$app = new \Slim\App($container);


$settings = $container->get('settings');
$settings->replace([
    'displayErrorDetails' => true,
    'determineRouteBeforeAppMiddleware' => true,
    'debug' => true
]);

$container = $app->getContainer();

$app->post('/SignUp', \Conntroller\SignUpController::class .':test');

$app->run();
