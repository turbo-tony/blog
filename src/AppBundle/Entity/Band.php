<?php

namespace AppBundle\Entity;
use ABPlus\CoreBundle\Entity\Traits\IdTrait;
use ABPlus\CoreBundle\Entity\Traits\NameTrait;
use AppBundle\Entity\Traits\AuthorRoleTrait;
use AppBundle\Entity\Traits\CountryTrait;
use AppBundle\Entity\Traits\GenresTrait;
use AppBundle\Entity\Traits\LanguageTrait;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Band
 */
class Band
{
    use IdTrait, NameTrait, LanguageTrait, CountryTrait, GenresTrait, AuthorRoleTrait;

    /**
     * @var int
     */
    private $creationYear;

    /**
     * @var int
     */
    private $disbandYear;

    public function __construct()
    {
        $this->initGenres();
        $this->initAuthors();
    }

    /**
     * Set creationYear
     *
     * @param integer $creationYear
     * @return Band
     */
    public function setCreationYear($creationYear)
    {
        $this->creationYear = $creationYear;

        return $this;
    }

    /**
     * Get creationYear
     *
     * @return integer
     */
    public function getCreationYear()
    {
        return $this->creationYear;
    }

    /**
     * Set disbandYear
     *
     * @param integer $disbandYear
     * @return Band
     */
    public function setDisbandYear($disbandYear)
    {
        $this->disbandYear = $disbandYear;

        return $this;
    }

    /**
     * Get disbandYear
     *
     * @return integer
     */
    public function getDisbandYear()
    {
        return $this->disbandYear;
    }

    public function getDefaultLanguage()
    {
        if (!is_null($this->getCountry())) {
            return $this->getCountry()->getMainLanguage();
        }
        return null;
    }
}
