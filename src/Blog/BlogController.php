<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-03
 * Time: 1:55 PM
 */

namespace Blog\Blog;


use Blog\Factory\ResponderFactory;
use Blog\Responder\Responder;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class BlogController
 *
 * @package Blog\Blog
 */
class BlogController
{
    /**
     * @var \Blog\Factory\ResponderFactory
     */
    protected $responder;

    /**
     * @var \Blog\Blog\BlogDomain
     */
    protected $domain;

    /**
     * BlogController constructor.
     *
     * @param \Blog\Factory\ResponderFactory $responder
     * @param \Blog\Blog\BlogDomain     $domain
     */
    public function __construct(ResponderFactory $responder, BlogDomain $domain) {
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
        $jsonResponder = $this->responder->getJsonResponder();
        return $jsonResponder->renderJSON($response, $entity->data());
    }

    /**
     * @param \Slim\Http\Request  $request
     * @param \Slim\Http\Response $response
     * @param                     $args
     * @return \Slim\Http\Response
     */
    public function get(Request $request, Response $response, $args) {
        $entity = $this->domain->getPostEntity($request);
        $jsonResponder = $this->responder->getJsonResponder();
        return $jsonResponder->renderJSON($response, $entity->data());
    }

    /**
     * @param \Slim\Http\Request  $request
     * @param \Slim\Http\Response $response
     * @param                     $args
     * @return \Slim\Http\Response
     */
    public function update(Request $request, Response $response, $args) {
        $entity = $this->domain->updatePost($request);
        $jsonResponder = $this->responder->getJsonResponder();
        return $jsonResponder->renderJSON($response, $entity->data());
    }

    /**
     * @param \Slim\Http\Request  $request
     * @param \Slim\Http\Response $response
     * @param                     $args
     * @return \Slim\Http\Response
     */
    public function remove(Request $request, Response $response, $args) {
        $entity = $this->domain->removePost($request);
        $jsonResponder = $this->responder->getJsonResponder();
        return $jsonResponder->renderJSON($response, $entity->data());
    }


    /**
     * @param \Slim\Http\Request  $request
     * @param \Slim\Http\Response $response
     * @param                     $args
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function homePage(Request $request, Response $response, $args) {
        $posts = $this->domain->getLastFivePosts($request);
        $htmlResponder = $this->responder->getHtmlResponder();
        return $htmlResponder->renderTwigTemplate($response, "home.twig", []);
    }

    /**
     * @param \Slim\Http\Request  $request
     * @param \Slim\Http\Response $response
     * @param                     $args
     * @return \Slim\Http\Response
     */
    public function migrate(Request $request, Response $response, $args) {
        $this->domain->migrate();
        $jsonResponder = $this->responder->getJsonResponder();
        return $jsonResponder->renderJSON($response, ["status" => "done"]);
    }
}