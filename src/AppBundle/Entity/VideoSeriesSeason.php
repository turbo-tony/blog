<?php

namespace AppBundle\Entity;

use ABPlus\CoreBundle\Entity\Traits\OrderTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Video series season
 */
class VideoSeriesSeason extends Issue
{
    use OrderTrait;

    protected $issueTypeId = IssueType::VIDEO_SERIES_SEASON;

    /**
     * @var int
     */
    private $count;

    /**
     */
    private $episodes;

    /**
     * Set count
     *
     * @param integer $count
     * @return $this
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return integer
     */
    public function getCount()
    {
        return $this->count;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->episodes = new ArrayCollection();
    }

    /**
     * Add episodes
     *
     * @param VideoSeriesEpisode $episode
     * @return $this
     */
    public function addEpisode(VideoSeriesEpisode $episode)
    {
        if (!$this->episodes->contains($episode)) {
            $this->episodes->add($episode);
        }

        return $this;
    }

    /**
     * Remove episodes
     *
     * @param VideoSeriesEpisode $episode
     */
    public function removeEpisode(VideoSeriesEpisode $episode)
    {
        $this->episodes->removeElement($episode);
    }

    /**
     * Get episodes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEpisodes()
    {
        return $this->episodes;
    }
}
