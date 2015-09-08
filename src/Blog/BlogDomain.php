<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 2:41 PM
 */

namespace Blog\Blog;
use Blog\Domain\Domain;
use Blog\Factory\PostFactory;
use Blog\Repository\PostRepository;
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
     */
    public function createPost(Request $request) {
        $postFactory = new PostFactory($this->locator);
        $entity = $postFactory->create($this->postArrayFromRequest($request, true));
        return $entity;
    }

    /**
     * @param \Slim\Http\Request $request
     * @return \Blog\Entities\Post
     */
    public function getPostEntity(Request $request) {
        $postRepo = new PostRepository($this->locator);
        $entity = $postRepo->getPostEntity($this->postArrayFromRequest($request, false));
        return $entity;
    }

    /**
     * @param \Slim\Http\Request $request
     * @return \Blog\Entities\Post
     */
    public function updatePost(Request $request) {
        $postRepo = new PostRepository($this->locator);
        $entity = $postRepo->updatePost($this->postArrayFromRequest($request, false));
        return $entity;
    }

    /**
     * @param \Slim\Http\Request $request
     * @return bool|\Doctrine\DBAL\Driver\Statement|int
     */
    public function removePost(Request $request) {
        $postRepo = new PostRepository($this->locator);
        $entity = $postRepo->removePost($this->postArrayFromRequest($request, false));
        return $entity;
    }

    /**
     * @param \Slim\Http\Request $request
     * @return mixed
     */
    public function getLastFivePosts(Request $request) {
        $postRepo = new PostRepository($this->locator);
        $posts = $postRepo->getLastFivePosts();
        return $posts;
    }


    public function migrate() {
        /** @var $mapper \Spot\Mapper */
        $mapper = $this->locator->mapper(Post::class);
        $mapper->migrate();
    }


    //Blog Services

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