<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-11
 * Time: 1:24 PM
 */

namespace Blog\Factory;


use Blog\Responder\HtmlResponder;
use Blog\Responder\JsonResponder;
use Slim\Views\Twig;

class ResponderFactory
{
    /**
     * @var \Slim\Views\Twig
     */
    protected $twig;

    /**
     * ResponderFactory constructor.
     *
     * @param \Slim\Views\Twig $twig
     */
    public function __construct(Twig $twig) {
        $this->twig = $twig;
    }

    /**
     * @return \Blog\Responder\HtmlResponder
     */
    public function getHtmlResponder() {
        return new HtmlResponder($this->twig);
    }

    /**
     * @return \Blog\Responder\JsonResponder
     */
    public function getJsonResponder() {
        return new JsonResponder($this->twig);
    }

}