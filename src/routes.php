<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 1:15 PM
 */

use Blog\Blog\BlogController;
use Blog\Middleware\SecurityMiddleware;

$security = $app->getContainer()->get(SecurityMiddleware::class);
$app->get(      '/',                BlogController::class . ":homePage");
$app->put(      '/blog/{id:\d+}',   BlogController::class . ":update")->addMiddleware($security);
$app->post(     '/blog',            BlogController::class . ":create")->addMiddleware($security);
$app->get(      '/blog/{id:\d+}',   BlogController::class . ":get")->addMiddleware($security);
$app->delete(   '/blog/{id:\d+}',   BlogController::class . ":remove")->addMiddleware($security);

//setup db tables
$app->get(      '/blog/migrate',    BlogController::class . ":migrate")->addMiddleware($security);