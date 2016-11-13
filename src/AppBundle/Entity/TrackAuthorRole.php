<?php

namespace AppBundle\Entity;

/**
 * TrackAuthorRole
 */
class TrackAuthorRole extends AbstractAuthorRole
{
    protected $track;

    public function setTrack(Track $track)
    {
        $this->track = $track;

        return $this;
    }

    public function getTrack()
    {
        return $this->track;
    }
}
