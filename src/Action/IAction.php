<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 1:18 PM
 */

namespace Blog\Action;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

/**
 * Interface IAction
 *
 * @package Blog\Action
 */
interface IAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $args);
}