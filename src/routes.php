<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 1:15 PM
 */
use Blog\Blog\Actions\CreateAction as BlogCreateAction;
use Blog\Blog\Actions\EditAction as BlogEditAction;
use Blog\Blog\Actions\HomePageAction;

$app->get('/', HomePageAction::class);
$app->put('/blog/{id}', BlogEditAction::class);
$app->post('/blog', BlogCreateAction::class);