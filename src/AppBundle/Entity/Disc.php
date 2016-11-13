<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\BandTrait;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Disc
 */
class Disc extends Issue
{
    use BandTrait;

    protected $issueTypeId = IssueType::DISC;

    /**
     */
    private $trackGroups;

    public function __construct()
    {
        $this->trackGroups = new ArrayCollection();
    }

    public function addTrackGroups($trackGroups)
    {
        foreach ($trackGroups as $trackGroup) {
            $this->addTrackGroup($trackGroup);
        }
    }

    /**
     * Add trackGroups
     *
     * @param TrackGroup $trackGroup
     * @return Disc
     */
    public function addTrackGroup(TrackGroup $trackGroup)
    {
        $trackGroup->setDisc($this);
        $this->trackGroups[] = $trackGroup;

        return $this;
    }

    /**
     * Remove trackGroups
     *
     * @param TrackGroup $trackGroup
     */
    public function removeTrackGroup(TrackGroup $trackGroup)
    {
        $this->trackGroups->removeElement($trackGroup);
    }

    /**
     * Get trackGroups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTrackGroups()
    {
        return $this->trackGroups;
    }

    public function getDefaultAuthors()
    {
        $authors = null;
        if (!is_null($this->getSeries())) {
            $authors = $this->getSeries()->getAuthors();
        }
        if (!is_null($this->getBand())) {
            $authors = $this->getBand()->getDefaultMembers();
        }
        if (is_null($authors)) {
            return parent::getDefaultAuthors();
        }
        return $authors;
    }

    public function getDefaultCountry()
    {
        if (!is_null($this->getSeries())) {
            return $this->getSeries()->getCountry();
        }
        if (!is_null($this->getBand())) {
            return $this->getBand()->getCountry();
        }
        return parent::getDefaultCountry();
    }

    public function getDefaultLanguage()
    {
        if (!is_null($this->getCountry())) {
            return $this->getCountry()->getMainLanguage();
        }
        if (!is_null($this->getSeries())) {
            return $this->getSeries()->getLanguage();
        }
        if (!is_null($this->getBand())) {
            return $this->getBand()->getLanguage();
        }
        return parent::getDefaultLanguage();
    }

    public function getDefaultGenres()
    {
        if (!is_null($this->getSeries())) {
            return $this->getSeries()->getGenres();
        }
        if (!is_null($this->getBand())) {
            return $this->getBand()->getGenres();
        }
        return parent::getDefaultGenres();
    }
}
