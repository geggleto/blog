<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 2:41 PM
 */

namespace Blog\Blog;
use Blog\Domain\Domain;

/**
 * Class BlogDomain
 *
 * @package Blog\Domain
 */
class BlogDomain extends Domain
{
    /**
     * @param \PDO $PDO
     */
    public function __construct(\PDO $PDO) {
        parent::__construct($PDO);
    }


}