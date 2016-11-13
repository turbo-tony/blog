<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SerialEpisode
 */
class VideoSeriesEpisode extends Video
{
    protected $issueTypeId = IssueType::VIDEO_SERIES_EPISODE;

    /**
     * @var VideSeriesSeason
     */
    private $season;

    public function setSeason($season)
    {
        $this->season = $season;
    }

    public function getSeason()
    {
        return $this->season;
    }
}
