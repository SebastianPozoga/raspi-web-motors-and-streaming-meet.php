<?php

if(!$_IS_RUN) exit('Access denied');

error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../lib/Cam.php';

$path = __DIR__.'/stream.jpg';

$cam = new Cam();
$cam->startStream($path);


//unlink($path);
//$cam->takePicture($path);
//chmod($path, 0777);