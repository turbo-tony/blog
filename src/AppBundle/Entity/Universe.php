<?php

namespace AppBundle\Entity;

use ABPlus\CoreBundle\Entity\Traits\IdTrait;
use ABPlus\CoreBundle\Entity\Traits\NameTrait;
use ABPlus\CoreBundle\Entity\Traits\OriginalNameTrait;

use AppBundle\Entity\Traits\AuthorRoleTrait;
use AppBundle\Entity\Traits\CountryTrait;

use AppBundle\Entity\Traits\GenresTrait;
use AppBundle\Entity\Traits\LanguageTrait;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Universe
 */
class Universe
{
    use IdTrait, NameTrait, OriginalNameTrait, LanguageTrait,
        CountryTrait, AuthorRoleTrait, GenresTrait;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->initGenres();
        $this->initAuthors();
    }

    public function getDefaultLanguage()
    {
        if (!is_null($this->getCountry())) {
            return $this->getCountry()->getMainLanguage();

        }
        return null;
    }
}
