<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../vendor/autoload.php';
$container = new \Slim\Container;
$app = new \Slim\App($container);


$settings = $container->get('settings');
$settings->replace([
    'displayErrorDetails' => true,
    'determineRouteBeforeAppMiddleware' => true,
    'debug' => true
]);

$container = $app->getContainer();

$app->post('/SignUp', \Conntroller\SignUpController::class .':SignUpController');
$app->post('/SignIn', \Conntroller\SignInController::class . ':SignInController');
$app->post('/MakePost', \Conntroller\MakePostController::class . ':MakePostController');
$app->post('/BloggerSearch', \Conntroller\MakePostController::class . ':MakePostController');
$app->post('/UpdatePost', \Conntroller\UpdatePostController::class . ':UpdatePostController');
$app->post('/UpdateAccount', \Conntroller\UpdateAccountController::class . ':UpdateAccount');

$app->run();
