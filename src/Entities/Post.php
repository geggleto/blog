<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-03
 * Time: 2:57 PM
 */

namespace Blog\Entities;


use Spot\Entity;
use Spot\Mapper;

/**
 * Class Post
 *
 * @package Blog\Entities
 */
class Post extends Entity
{
    protected static $table = 'posts';

    public static function fields()
    {
        return [
            'id'           => ['type' => 'integer', 'autoincrement' => true, 'primary' => true],
            'title'        => ['type' => 'string', 'required' => true],
            'body'         => ['type' => 'text', 'required' => true],
            'status'       => ['type' => 'integer', 'default' => 0, 'index' => true],
            'date_created' => ['type' => 'datetime', 'value' => new \DateTime()]
        ];
    }

    public static function relations(Mapper $mapper, Entity $entity)
    {
        return [
        ];
    }
}