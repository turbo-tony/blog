<?php

namespace AppBundle\Entity;

use ABPlus\CoreBundle\Entity\Traits\IdTrait;
use ABPlus\CoreBundle\Entity\Traits\NameTrait;
use ABPlus\CoreBundle\Entity\Traits\OrderTrait;
use AppBundle\Entity\Traits\IssueTrait;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrackGroup
 *
 * @todo Constraint: name + disc unicity
 */
class TrackGroup
{
    use IdTrait, NameTrait, IssueTrait, OrderTrait;

    /**
     */
    private $tracks;

    public function __construct()
    {
        $this->tracks = new ArrayCollection();
    }

    /**
     * Add tracks
     *
     * @param Track $track
     * @return TrackGroup
     */
    public function addTrack(Track $track)
    {
        $track->setTrackGroup($this);
        $this->tracks[] = $track;

        return $this;
    }

    /**
     * Remove tracks
     *
     * @param Track $track
     */
    public function removeTrack(Track $track)
    {
        $this->tracks->removeElement($track);
    }

    /**
     * Get tracks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTracks()
    {
        return $this->tracks;
    }
}
