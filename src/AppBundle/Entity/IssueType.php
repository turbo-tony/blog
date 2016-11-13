<?php

namespace AppBundle\Entity;
use ABPlus\CoreBundle\Entity\Traits\IdTrait;
use ABPlus\CoreBundle\Entity\Traits\NameTrait;
use AppBundle\Entity\Traits\MediumTrait;

/**
 * IssueType
 */
class IssueType
{
    use IdTrait, NameTrait, MediumTrait;

    const UNKNOWN               = 0;
    const COMIC                 = 1;
    const BOOK                  = 2;
    const MOVIE                 = 3;
    const DISC                  = 4;
    const VIDEO_SERIES_SEASON   = 5;
    const VIDEO_SERIES_EPISODE  = 6;
}
