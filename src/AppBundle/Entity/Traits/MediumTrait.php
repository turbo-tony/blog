<?php
/**
 * Contains the Medium Trait for entity classes
 *
 * @author      Antoine Bousquet <antoine.p.bousquet@gmail.com>
 * @copyright   ABPlus 2016
 * @package     Blog
 * @subpackage  AppBundle
 * @category    EntityTrait
 */

namespace AppBundle\Entity\Traits;

use AppBundle\Entity\Medium;

/**
 * Medium Trait for entity classes
 *
 * @author      Antoine Bousquet <antoine.p.bousquet@gmail.com>
 * @package     Blog
 * @subpackage  AppBundle
 * @category    EntityTrait
 */
Trait MediumTrait
{
    /**
     * Medium
     *
     * @var Medium
     */
    protected $medium;

    /**
     * Set medium
     *
     * @param Medium $medium
     * @return $this
     */
    public function setMedium(Medium $medium = null)
    {
        $this->medium = $medium;

        return $this;
    }

    /**
     * Get medium
     *
     * @return Medium
     */
    public function getMedium()
    {
        return $this->medium;
    }
}
