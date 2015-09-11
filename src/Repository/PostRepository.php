<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-08
 * Time: 1:00 PM
 */

namespace Blog\Repository;


use Blog\Entities\Post;
use Spot\Locator;

/**
 * Class PostRepository
 *
 * @package Blog\Repository
 */
class PostRepository
{
    /**
     * @var \Spot\Mapper
     */
    protected $mapper;

    /**
     * PostRepository constructor.
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
    public function updatePost($data = []) {

        /** @var $entity \Blog\Entities\Post */
        $entity = $this->getPostEntity($data);

        if ($entity !== false) {
            $entity->data($data);
            $this->mapper->save($entity);
        }

        return $entity;
    }

    /**
     * @param array $data
     * @return bool|\Doctrine\DBAL\Driver\Statement|int
     */
    public function removePost($data = []) {
        /** @var $entity \Blog\Entities\Post */
        $entity = $this->getPostEntity($data);

        if ($entity !== false) {
            return $this->mapper->delete(Post::class, ['id' => $entity->id]);
        } else {
            return false;
        }

    }

    /**
     * @param array $data
     * @return \Blog\Entities\Post
     */
    public function getPostEntity($data = []) {

        /** @var $entity \Blog\Entities\Post */
        $entity = $this->mapper->get($data['id']);

        return $entity;
    }

    /**
     * @return mixed
     */
    public function getLastFivePosts() {
        return $this->mapper->where(['status' => 1])
            ->limit(5)
            ->order(['date_created' => 'DESC']);
    }

}