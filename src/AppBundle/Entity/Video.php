<?php

namespace AppBundle\Entity;

use ABPlus\CoreBundle\Entity\Traits\OrderTrait;
use AppBundle\Entity\Traits\DurationTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Movie
 */
class Video extends Issue
{
    use OrderTrait, DurationTrait;
}
