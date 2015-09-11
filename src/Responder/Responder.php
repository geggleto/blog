<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 1:57 PM
 */

namespace Blog\Responder;
use Slim\Http\Response;
use Slim\Views\Twig;

/**
 * Class Responder
 *
 * @package Blog\Responder
 */
class Responder
{
    /**
     * @var \Slim\Views\Twig
     */
    protected $view;

    /**
     * @param \Slim\Views\Twig $twig
     */
    public function __construct(Twig $twig) {
        $this->view = $twig;
    }

}