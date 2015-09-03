<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 1:13 PM
 */

use Blog\Blog\Actions\CreateAction;
use Blog\Blog\Domain\BlogDomain;
use Blog\Responder\Responder;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Blog\Blog\Actions\HomePageAction;

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
    HomePageAction::class =>
    /**
     * @param $c
     * @return HomePageAction
     */
        function ($c) {
            return new HomePageAction(
                $c[BlogDomain::class],
                $c[Responder::class]
            );
    },
    CreateAction::class => /**
     * @param $c
     * @return CreateAction
     */
        function ($c) {
            return new CreateAction();
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
    }
];