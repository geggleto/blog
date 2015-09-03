<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-09-02
 * Time: 1:58 PM
 */

namespace Blog\Domain;
use Spot\Locator;

/**
 * Class Domain
 *
 * @package Blog\Domain
 */
class Domain
{
    /**
     * @var \Spot\Locator
     */
    protected $locator;

    /**
     * Domain constructor.
     *
     * @param \Spot\Locator $locator
     */
    public function __construct(Locator $locator) {
        $this->locator = $locator;
    }
}