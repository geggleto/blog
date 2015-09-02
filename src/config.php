<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 1:13 PM
 */

use Blog\Action\ActionFactory;
use Blog\Domain\BlogDomain;
use Blog\Responder\BlogResponder;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

return [
    "settings" => [
        "db" => [
            "dsn" => "mysql:host=localhost;dbname=blog",
            "username" => "root",
            "password" => "",
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
    \Blog\Action\Blog\HomePageAction::class =>
    /**
     * @param $c
     * @return \Blog\Action\Blog\HomePageAction
     */
        function ($c) {
            return new \Blog\Action\Blog\HomePageAction(
                $c[BlogDomain::class],
                $c[BlogResponder::class]
            );
    },
    \Blog\Action\Blog\CreateAction::class => /**
     * @param $c
     * @return \Blog\Action\Blog\CreateAction
     */
        function ($c) {
            return new \Blog\Action\Blog\CreateAction();
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
    BlogResponder::class => function ($c) {
        return new BlogResponder($c['view']);
    }
];