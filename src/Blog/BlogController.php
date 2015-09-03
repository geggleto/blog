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
    protected $responder;

    protected $domain;

    public function __construct(Responder $responder, BlogDomain $domain) {
        $this->responder = $responder;
        $this->domain = $domain;
    }

    public function create(Request $request, Response $response, $args) {
        return $response;
    }

    public function get(Request $request, Response $response, $args) {
        return $response;
    }

    public function update(Request $request, Response $response, $args) {
        return $response;
    }

    public function remove(Request $request, Response $response, $args) {
        return $response;
    }

    public function homePage(Request $request, Response $response, $args) {
        return $this->responder->renderTwigTemplate($response, "home.twig", []);
    }
}