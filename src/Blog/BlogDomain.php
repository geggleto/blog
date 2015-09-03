<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 2:41 PM
 */

namespace Blog\Blog;
use Blog\Domain\Domain;
use Slim\Http\Request;
use Spot\Locator;
use Blog\Entities\Post;

/**
 * Class BlogDomain
 *
 * @package Blog\Domain
 */
class BlogDomain extends Domain
{
    /**
     * @param \Spot\Locator $locator
     */
    public function __construct(Locator $locator) {
        parent::__construct($locator);
    }

    /**
     * @param \Slim\Http\Request $request
     * @return \Spot\Entity
     * @throws \Spot\InvalidArgumentException
     */
    public function createPost(Request $request) {
        /** @var $mapper \Spot\Mapper */
        $mapper = $this->locator->mapper(Post::class);

        $entity = $mapper->build([
            'title' => $request->getParsedBody()['title'],
            'body' => $request->getParsedBody()['body'],
            'status' => $request->getParsedBody()['status'],
            'date_created' => new \DateTime()
        ]);

        $mapper->save($entity);

        return $entity;
    }

    public function updatePost(Request $request) {
        $mapper = $this->locator->mapper(Post::class);
    }
}