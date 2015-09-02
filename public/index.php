<?php
require '../vendor/autoload.php';

$container = include "../src/config.php";
$app = new Slim\App(
    new \Slim\Container($container)
);

include "../src/routes.php";

$app->run();
