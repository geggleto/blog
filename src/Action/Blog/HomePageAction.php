<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 2:03 PM
 */

namespace Blog\Action\Blog;


use Blog\Action\IAction;
use Blog\Domain\BlogDomain;
use Blog\Responder\BlogResponder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class HomePageAction
 *
 * @package Blog\Action\Blog
 */
class HomePageAction implements IAction
{
    /**
     * @var \Blog\Domain\BlogDomain
     */
    private $domain;

    /**
     * @var \Blog\Responder\BlogResponder
     */
    private $responder;

    /**
     * @param \Blog\Domain\BlogDomain       $domain
     * @param \Blog\Responder\BlogResponder $responder
     */
    public function __construct(BlogDomain $domain, BlogResponder $responder) {
        $this->domain = $domain;
        $this->responder = $responder;
    }

    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface      $response
     * @param                                          $args
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        return $this->responder->renderHomePage($response, []);
    }

}