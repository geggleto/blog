<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 2:56 PM
 */

namespace Blog\Responder;


use Slim\Http\Response;
use Slim\Views\Twig;

/**
 * Class BlogResponder
 *
 * @package Blog\Responder
 */
class BlogResponder extends Responder
{
    const HOME_TEMPLATE = "home.twig";
    /**
     * @param \Slim\Views\Twig $twig
     */
    public function __construct(Twig $twig) {
        parent::__construct($twig);
    }

    public function renderHomePage(Response $response, $data = []) {
        return $this->view->render($response, self::HOME_TEMPLATE, $data);
    }
}