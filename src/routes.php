<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 1:15 PM
 */
use Blog\Action\Blog\CreateAction as BlogCreateAction;
use Blog\Action\Blog\EditAction as BlogEditAction;
use Blog\Action\Blog\HomePageAction;

$app->get('/', HomePageAction::class);
$app->put('/blog/{id}', BlogEditAction::class);
$app->post('/blog', BlogCreateAction::class);