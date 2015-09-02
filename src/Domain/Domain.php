<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 1:58 PM
 */

namespace Blog\Domain;

/**
 * Class Domain
 *
 * @package Blog\Domain
 */
class Domain
{
    /**
     * @var \Blog\Domain\PDO
     */
    protected $pdo;

    /**
     * @param \Blog\Domain\PDO $PDO
     */
    public function __construct(\PDO $PDO) {
        $this->pdo = $PDO;
    }
}