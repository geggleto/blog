<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 1:48 PM
 */

namespace Blog\Action\Blog;


use Blog\Action\IAction;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class CreateAction
 *
 * @package Blog\Action\Blog
 */
class CreateAction implements IAction
{

    public function __construct() {

    }

    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface      $response
     * @param                                          $args
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke (ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        return $response;
    }

}