<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-04
 * Time: 2:57 PM
 */

namespace Blog\Middleware;


use Slim\Http\Request;
use Slim\Http\Response;

class SecurityMiddleware
{
    /**
     * @var string
     */
    private $key;

    /**
     * SecurityMiddleware constructor.
     *
     * @param string $key
     */
    public function __construct($key = '') {
        $this->key = $key;
    }


    public function __invoke(Request $request, Response $response, $next) {
        $requestKey = $request->getParsedBody()["api_key"];
        if ($this->key === $requestKey) {
            return $next($request, $response);
        } else {
            return $response->withStatus(401);
        }
    }
}