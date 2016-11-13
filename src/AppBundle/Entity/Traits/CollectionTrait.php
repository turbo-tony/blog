<?php
/**
 * Contains the Collection Trait for entity classes
 *
 * @author      Antoine Bousquet <antoine.p.bousquet@gmail.com>
 * @copyright   ABPlus 2016
 * @package     Blog
 * @subpackage  AppBundle
 * @category    EntityTrait
 */

namespace AppBundle\Entity\Traits;

use AppBundle\Entity\Collection;

/**
 * Colection Trait for entity classes
 *
 * @author      Antoine Bousquet <antoine.p.bousquet@gmail.com>
 * @package     Blog
 * @subpackage  AppBundle
 * @category    EntityTrait
 */
Trait CollectionTrait
{
    /**
     * Collection
     *
     * @var Collection
     */
    protected $collection;

    /**
     * Set Collection
     *
     * @param Collection $collection
     * @return $this
     */
    public function setCollection(Collection $collection = null)
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * Get Collection
     *
     * @return Collection
     */
    public function getCollection()
    {
        return $this->collection;
    }
}
