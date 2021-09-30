<?php
require '../config/dev.php';
require '../vendor/autoload.php';

session_start();
$router = new \Site\config\Router();
$router->run();
?>