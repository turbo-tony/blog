<?php

namespace AppBundle\Entity;

use ABPlus\CoreBundle\Entity\Traits\IdTrait;
use ABPlus\CoreBundle\Entity\Traits\LabelTrait;

use AppBundle\Entity\Traits\MediumTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 */
class Role
{
    use IdTrait, LabelTrait, MediumTrait;
}
