<?php

define('APP_MODE', 'development');

require 'raspi/Cam.php';
require 'raspi/Motors.php';

require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();


$app = new \Slim\Slim(array(
    'debug' => TRUE,
    'mode' => 'development'
        ));

$app->get('/', function () {
    require 'main.php';
});

$app->post('/api/stream/start', function () {
    $cam = new Cam();
    $response = $cam->startStream(__DIR__.'/api/stream.jpg');
    echo json_encode($response);
});

$app->post('/api/stream/stop', function () {
    $cam = new Cam();
    $response = $cam->stopStream();
    echo json_encode($response);
});

$app->post('/api/go/left', function () {
    $motors = new Motors();
    $motors->left();
});

$app->post('/api/go/right', function () {
    $motors = new Motors();
    $motors->right();
});

$app->post('/api/go/ahead', function () {
    $motors = new Motors();
    $motors->ahead();
});


$app->run();
