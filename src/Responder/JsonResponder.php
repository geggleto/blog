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

class JsonResponder extends Responder
{

    /**
     * @param \Slim\Views\Twig $twig
     */
    public function __construct(Twig $twig) {
        parent::__construct($twig);
    }

    /**
     * @param \Slim\Http\Response $response
     * @param array               $data
     * @return \Slim\Http\Response
     */
    public function renderJSON(Response $response, $data = []) {
        return $response->write(json_encode($data));
    }
}