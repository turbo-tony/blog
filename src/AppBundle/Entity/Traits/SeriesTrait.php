<?php
/**
 * Contains the Series Trait for entity classes
 *
 * @author      Antoine Bousquet <antoine.p.bousquet@gmail.com>
 * @copyright   ABPlus 2016
 * @package     Blog
 * @subpackage  AppBundle
 * @category    EntityTrait
 */

namespace AppBundle\Entity\Traits;

use AppBundle\Entity\Series;

/**
 * Series Trait for entity classes
 *
 * @author      Antoine Bousquet <antoine.p.bousquet@gmail.com>
 * @package     Blog
 * @subpackage  AppBundle
 * @category    EntityTrait
 */
Trait SeriesTrait
{
    /**
     * Series
     *
     * @var Series
     */
    protected $series;

    /**
     * Set Series
     *
     * @param Series $series
     * @return $this
     */
    public function setSeries(Series $series = null)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Get Series
     *
     * @return Series
     */
    public function getSeries()
    {
        return $this->series;
    }
}
