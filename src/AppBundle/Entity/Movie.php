<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movie
 */
class Movie extends Video
{
    protected $issueTypeId = IssueType::MOVIE;
}
