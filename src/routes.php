<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 1:15 PM
 */

use Blog\Blog\BlogController;

$app->get(      '/',            BlogController::class . ":homePage");
$app->put(      '/blog/{id}',   BlogController::class . ":update");
$app->post(     '/blog',        BlogController::class . ":create");
$app->get(      '/blog/{id}',   BlogController::class . ":get");
$app->delete(   '/blog/{id}',   BlogController::class . ":remove");