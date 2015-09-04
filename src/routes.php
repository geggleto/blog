<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 1:15 PM
 */

use Blog\Blog\BlogController;
use Blog\Middleware\SecurityMiddleware;


$app->get(      '/',            BlogController::class . ":homePage");
$app->put(      '/blog/{id:\d+}',   BlogController::class . ":update")->addMiddleware(SecurityMiddleware::class);
$app->post(     '/blog',        BlogController::class . ":create")->addMiddleware(SecurityMiddleware::class);
$app->get(      '/blog/{id:\d+}',   BlogController::class . ":get")->addMiddleware(SecurityMiddleware::class);
$app->delete(   '/blog/{id:\d+}',   BlogController::class . ":remove")->addMiddleware(SecurityMiddleware::class);

//setup db tables
$app->get(   '/blog/migrate',   BlogController::class . ":migrate")->addMiddleware(SecurityMiddleware::class);