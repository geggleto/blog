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
     * @return \Blog\Entities\Post
     * @throws \Spot\InvalidArgumentException
     */
    public function createPost(Request $request) {
        /** @var $mapper \Spot\Mapper */
        $mapper = $this->locator->mapper(Post::class);

        /** @var $entity \Blog\Entities\Post */
        $entity = $mapper->build($this->postArrayFromRequest($request, true));

        $mapper->save($entity);

        return $entity;
    }

    /**
     * @param \Slim\Http\Request $request
     * @return \Blog\Entities\Post
     * @throws \Spot\InvalidArgumentException
     */
    public function updatePost(Request $request) {
        /** @var $mapper \Spot\Mapper */
        $mapper = $this->locator->mapper(Post::class);

        /** @var $entity \Blog\Entities\Post */
        $entity = $this->getPostEntity($request);

        if ($entity !== false) {
            $entity->data($this->postArrayFromRequest($request, false));
            $mapper->save($entity);
        }

        return $entity;
    }

    /**
     * @param \Slim\Http\Request $request
     * @return \Blog\Entities\Post
     */
    public function removePost(Request $request) {
        /** @var $mapper \Spot\Mapper */
        $mapper = $this->locator->mapper(Post::class);

        /** @var $entity \Blog\Entities\Post */
        $entity = $this->getPostEntity($request);

        if ($entity !== false) {
            return $mapper->delete(Post::class, ['id' => $entity->id]);
        } else {
            return false;
        }

    }

    /**
     * @param \Slim\Http\Request $request
     * @return \Blog\Entities\Post
     */
    public function getPostEntity(Request $request) {
        /** @var $mapper \Spot\Mapper */
        $mapper = $this->locator->mapper(Post::class);

        /** @var $entity \Blog\Entities\Post */
        $entity = $mapper->get($request->getParsedBody()['id']);

        return $entity;
    }

    /**
     * @param \Slim\Http\Request $request
     * @param bool|false         $time
     * @return array
     */
    protected function postArrayFromRequest(Request $request, $time = false) {
        $out = [
            'title' => $request->getParsedBody()['title'],
            'body' => $request->getParsedBody()['body'],
            'status' => $request->getParsedBody()['status'],
        ];
        if ($time) {
            $out['date_created'] = new \DateTime();
        }

        return $out;
    }
}