<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 2:31 PM
 */

namespace Blog\Action\Blog;


use Blog\Action\IAction;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class EditAction
 *
 * @package Blog\Action\Blog
 */
class EditAction implements IAction
{

    public function __invoke (ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        return $response;
    }
}