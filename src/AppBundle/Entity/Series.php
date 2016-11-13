<?php

namespace AppBundle\Entity;

use ABPlus\CoreBundle\Entity\Traits\IdTrait;
use ABPlus\CoreBundle\Entity\Traits\NameTrait;
use ABPlus\CoreBundle\Entity\Traits\OriginalNameTrait;
use AppBundle\Entity\Traits\AuthorRoleTrait;
use AppBundle\Entity\Traits\CollectionTrait;
use AppBundle\Entity\Traits\CountryTrait;
use AppBundle\Entity\Traits\EditorTrait;
use AppBundle\Entity\Traits\GenresTrait;
use AppBundle\Entity\Traits\IssueTypeTrait;
use AppBundle\Entity\Traits\LanguageTrait;
use AppBundle\Entity\Traits\UniverseTrait;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Series
 */
class Series
{
    use IdTrait, NameTrait, OriginalNameTrait, LanguageTrait,
        CountryTrait, EditorTrait, UniverseTrait, IssueTypeTrait, CollectionTrait,
        GenresTrait, AuthorRoleTrait;

    /**
     * @var bool
     */
    private $finished;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->initAuthors();
        $this->initGenres();
    }

    /**
     * Set finished
     *
     * @param boolean $finished
     * @return Series
     */
    public function setFinished($finished)
    {
        $this->finished = $finished;

        return $this;
    }

    /**
     * Get finished
     *
     * @return boolean
     */
    public function isFinished()
    {
        return $this->finished;
    }

    public function getDefaultAuthors()
    {
        $authors = null;
        if (!is_null($this->getUniverse())) {
            $authors = $this->getUniverse()->getAuthors();
        }
        if ($authors !== null) {
            return AuthorRole::convertAllForEntity($authors, $this);
        }
        return null;
    }

    public function getDefaultGenres()
    {
        if (!is_null($this->getUniverse())) {
            return $this->getUniverse()->getGenres();
        }
        if (!is_null($this->getCollection())) {
            return $this->getCollection()->getGenres();
        }
        if (!is_null($this->getEditor())) {
            return $this->getEditor()->getGenres();
        }
        return null;
    }

    public function getDefaultLanguage()
    {
        if (!is_null($this->getCountry())) {
            return $this->getCountry()->getMainLanguage();
        }
        if (!is_null($this->getUniverse())) {
            return $this->getUniverse()->getLanguage();
        }
        if (!is_null($this->getEditor())) {
            return $this->getEditor()->getLanguage();
        }
        return null;
    }

    public function getDefaultCountry()
    {
        if (!is_null($this->getUniverse())) {
            return $this->getUniverse()->getCountry();
        }
        if (!is_null($this->getEditor())) {
            return $this->getEditor()->getCountry();
        }
        return null;
    }
}
