<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-11
 * Time: 1:32 PM
 */

namespace Blog\Responder;


use Slim\Http\Response;
use Slim\Views\Twig;

class HtmlResponder extends Responder
{

    /**
     * @param \Slim\Views\Twig $twig
     */
    public function __construct(Twig $twig) {
        parent::__construct($twig);
    }

    /**
     * @param \Slim\Http\Response $response
     * @param                     $template
     * @param array               $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function renderTwigTemplate(Response $response, $template, $data = []) {
        return $this->view->render($response, $template, $data);
    }
}