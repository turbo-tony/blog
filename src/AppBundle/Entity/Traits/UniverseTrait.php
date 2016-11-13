<?php
/**
 * Contains the Universe Trait for entity classes
 *
 * @author      Antoine Bousquet <antoine.p.bousquet@gmail.com>
 * @copyright   ABPlus 2016
 * @package     Blog
 * @subpackage  AppBundle
 * @category    EntityTrait
 */

namespace AppBundle\Entity\Traits;

use AppBundle\Entity\Universe;

/**
 * Universe Trait for entity classes
 *
 * @author      Antoine Bousquet <antoine.p.bousquet@gmail.com>
 * @package     Blog
 * @subpackage  AppBundle
 * @category    EntityTrait
 */
Trait UniverseTrait
{
    /**
     * Universe
     *
     * @var Universe
     */
    protected $universe;

    /**
     * Set Universe
     *
     * @param Universe $universe
     * @return $this
     */
    public function setUniverse(Universe $universe = null)
    {
        $this->universe = $universe;

        return $this;
    }

    /**
     * Get Universe
     *
     * @return Universe
     */
    public function getUniverse()
    {
        return $this->universe;
    }
}
