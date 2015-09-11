<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 1:13 PM
 */

use Blog\Blog\BlogDomain;
use Blog\Middleware\SecurityMiddleware;
use Blog\Responder\Responder;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Blog\Blog\BlogController;
use Spot\Locator;
use Spot\Config;
use Blog\Factory\ResponderFactory;

return [
    "settings" => [
        "db" => [
            "spot2" => "mysql://root@localhost/blog"
        ],
        "templatesDirectory" => "../templates",
        "secret_key" => "<your_key_goes_here>"
    ],

    'view' => function ($c) {
        $view = new Twig(
            $c['settings']['templatesDirectory'],
            ['cache' => false]
        );

        // Instantiate and add Slim specific extension
        $view->addExtension(
            new TwigExtension(
                $c['router'],
                $c['request']->getUri()
            )
        );

        return $view;
    },
    BlogController::class =>
        function ($c) {
            return new BlogController(
                $c[ResponderFactory::class],
                $c[BlogDomain::class]
            );
    },
    BlogDomain::class => function ($c) {
        return new BlogDomain($c[Locator::class]);
    },
    Locator::class => function ($c) {
        $cfg = new Config();

        $cfg->addConnection('mysql', $c['settings']['db']['spot2']);

        return new \Spot\Locator($cfg);
    },
    SecurityMiddleware::class => function ($c) {
        return new SecurityMiddleware($c['settings']['key']);
    },
    ResponderFactory::class => function ($c) {
        return new ResponderFactory($c['view']);
    }


];