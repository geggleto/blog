<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-03
 * Time: 1:55 PM
 */

namespace Blog\Blog;


use Blog\Responder\Responder;
use Slim\Http\Request;
use Slim\Http\Response;

class BlogController
{
    /**
     * @var \Blog\Responder\Responder
     */
    protected $responder;

    /**
     * @var \Blog\Blog\BlogDomain
     */
    protected $domain;

    /**
     * BlogController constructor.
     *
     * @param \Blog\Responder\Responder $responder
     * @param \Blog\Blog\BlogDomain     $domain
     */
    public function __construct(Responder $responder, BlogDomain $domain) {
        $this->responder = $responder;
        $this->domain = $domain;
    }

    /**
     * @param \Slim\Http\Request  $request
     * @param \Slim\Http\Response $response
     * @param                     $args
     * @return \Slim\Http\Response
     */
    public function create(Request $request, Response $response, $args)
    {
        $entity = $this->domain->createPost($request);
        return $this->responder->renderJSON($response, $entity->data());
    }

    /**
     * @param \Slim\Http\Request  $request
     * @param \Slim\Http\Response $response
     * @param                     $args
     * @return \Slim\Http\Response
     */
    public function get(Request $request, Response $response, $args) {
        $entity = $this->domain->getPostEntity($request);
        return $this->responder->renderJSON($response, $entity->data());
    }

    /**
     * @param \Slim\Http\Request  $request
     * @param \Slim\Http\Response $response
     * @param                     $args
     * @return \Slim\Http\Response
     */
    public function update(Request $request, Response $response, $args) {
        $entity = $this->domain->updatePost($request);
        return $this->responder->renderJSON($response, $entity->data());
    }

    /**
     * @param \Slim\Http\Request  $request
     * @param \Slim\Http\Response $response
     * @param                     $args
     * @return \Slim\Http\Response
     */
    public function remove(Request $request, Response $response, $args) {
        $entity = $this->domain->removePost($request);
        return $this->responder->renderJSON($response, $entity->data());
    }


    /**
     * @param \Slim\Http\Request  $request
     * @param \Slim\Http\Response $response
     * @param                     $args
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function homePage(Request $request, Response $response, $args) {
        return $this->responder->renderTwigTemplate($response, "home.twig", []);
    }
}