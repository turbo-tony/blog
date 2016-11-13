<?php
/**
 * Contains the Band Trait for entity classes
 *
 * @author      Antoine Bousquet <antoine.p.bousquet@gmail.com>
 * @copyright   ABPlus 2016
 * @package     Blog
 * @subpackage  AppBundle
 * @category    EntityTrait
 */

namespace AppBundle\Entity\Traits;

use AppBundle\Entity\Band;

/**
 * Band Trait for entity classes
 *
 * @author      Antoine Bousquet <antoine.p.bousquet@gmail.com>
 * @package     Blog
 * @subpackage  AppBundle
 * @category    EntityTrait
 */
Trait BandTrait
{
    /**
     * Band
     *
     * @var Band
     */
    protected $band;

    /**
     * Set Band
     *
     * @param Band $band
     * @return $this
     */
    public function setBand(Band $band = null)
    {
        $this->band = $band;

        return $this;
    }

    /**
     * Get Band
     *
     * @return Band
     */
    public function getBand()
    {
        return $this->band;
    }
}
