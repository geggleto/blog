<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-08
 * Time: 12:59 PM
 */

namespace Blog\Factory;


use Blog\Blog\BlogDomain;
use Blog\Entities\Post;
use Slim\Http\Request;
use Spot\Locator;

/**
 * Class PostFactory
 *
 * @package Blog\Factory
 */
class PostFactory
{
    /**
     * @var \Spot\Mapper
     */
    protected $mapper;

    /**
     * PostFactory constructor.
     *
     * @param \Spot\Locator $locator
     */
    public function __construct(Locator $locator) {
        /** @var $mapper \Spot\Mapper */
        $mapper = $locator->mapper(Post::class);

        $this->mapper = $mapper;
    }

    /**
     * @param array $data
     * @return \Blog\Entities\Post
     * @throws \Spot\InvalidArgumentException
     */
    public function create($data = []) {
        /** @var $entity \Blog\Entities\Post */
        $entity = $this->mapper->build($data);

        $this->mapper->save($entity);

        return $entity;
    }
}