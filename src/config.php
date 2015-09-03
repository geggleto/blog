<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 1:13 PM
 */

use Blog\Blog\BlogDomain;
use Blog\Responder\Responder;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Blog\Blog\BlogController;
use Spot\Locator;
use Spot\Config;

return [
    "settings" => [
        "db" => [
            "dsn" => "mysql:host=localhost;dbname=blog",
            "username" => "root",
            "password" => "",
            "spot2" => "mysql://root@localhost/blog"
        ],
        "templatesDirectory" => "../templates"
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
                $c[Responder::class],
                $c[BlogDomain::class]
            );
    },

    PDO::class => /**
     * @param $c
     * @return \PDO
     */
        function ($c) {
        return new PDO(
            $c['settings']['db']['dsn'],
            $c['settings']['db']['username'],
            $c['settings']['db']['password']
        );
    },
    BlogDomain::class => function ($c) {
        return new BlogDomain($c[PDO::class]);
    },
    Responder::class => function ($c) {
        return new Responder($c['view']);
    },
    Locator::class => function ($c) {
        $cfg = new Config();

        $cfg->addConnection('mysql', $c['settings']['db']['spot2']);

        return new \Spot\Locator($cfg);
    }


];