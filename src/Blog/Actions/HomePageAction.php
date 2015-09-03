<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 2:03 PM
 */

namespace Blog\Blog\Actions;


use Blog\Action\IAction;
use Blog\Blog\Domain\BlogDomain;
use Blog\Responder\Responder;
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
     * @var \Blog\Blog\Domain\BlogDomain
     */
    private $domain;

    /**
     * @var \Blog\Responder\Responder
     */
    private $responder;

    /**
     * HomePageAction constructor.
     *
     * @param \Blog\Blog\Domain\BlogDomain $domain
     * @param \Blog\Responder\Responder    $responder
     */
    public function __construct(BlogDomain $domain, Responder $responder) {
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
        return $this->responder->renderTwigTemplate($response, "home.twig", []);
    }

}