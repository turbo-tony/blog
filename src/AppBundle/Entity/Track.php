<?php

namespace AppBundle\Entity;

use ABPlus\CoreBundle\Entity\Traits\IdTrait;
use ABPlus\CoreBundle\Entity\Traits\NameTrait;
use ABPlus\CoreBundle\Entity\Traits\OrderTrait;
use AppBundle\Entity\Traits\AuthorRoleTrait;
use AppBundle\Entity\Traits\DurationTrait;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Track
 */
class Track
{
    use IdTrait, NameTrait, OrderTrait, DurationTrait, AuthorRoleTrait;

    /**
     * @var TrackGroup
     */
    private $trackGroup;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->initAuthors();
    }

    public function getDefaultAuthors()
    {
        $authors = null;
        if (!is_null($this->getTrackGroup()) && !is_null($this->getTrackGroup()->getDisc())) {
            $authors = $this->getTrackGroup()->getDisc()->getAuthors();
        }
        if ($authors !== null) {
            return AuthorRole::convertAllForEntity($authors, $this);
        }
        return null;
    }

    /**
     * Set trackGroup
     *
     * @param TrackGroup $trackGroup
     * @return Track
     */
    public function setTrackGroup(TrackGroup $trackGroup = null)
    {
        $this->trackGroup = $trackGroup;

        return $this;
    }

    /**
     * Get trackGroup
     *
     * @return TrackGroup
     */
    public function getTrackGroup()
    {
        return $this->trackGroup;
    }
}
