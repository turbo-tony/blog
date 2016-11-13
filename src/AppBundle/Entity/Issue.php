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
use AppBundle\Entity\Traits\SeriesTrait;
use AppBundle\Entity\Traits\UniverseTrait;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Issue
 */
class Issue
{
    use IdTrait, NameTrait, OriginalNameTrait, LanguageTrait,
        CountryTrait, UniverseTrait, EditorTrait, IssueTypeTrait, CollectionTrait, SeriesTrait,
        GenresTrait, AuthorRoleTrait;

    protected $issueTypeId = IssueType::UNKNOWN;

    /**
     * @var \DateTime
     */
    private $releaseDate;

    public function getIssueTypeId()
    {
        return $this->issueTypeId;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->initAuthors();
        $this->initGenres();
    }

    /**
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     * @return Issue
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \DateTime
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /*
    public function getDefaultCountry()
    {
        if (!is_null($this->getSeries())) {
            return $this->getSeries()->getCountry();
        }
        if (!is_null($this->getUniverse())) {
            return $this->getUniverse()->getCountry();
        }
        if (!is_null($this->getEditor())) {
            return $this->getEditor()->getCountry();
        }
        return null;
    }
    */

    public function getDefaultLanguage()
    {
        if (!is_null($this->getCountry())) {
            return $this->getCountry()->getMainLanguage();
        }
        if (!is_null($this->getSeries())) {
            return $this->getSeries()->getLanguage();
        }
        if (!is_null($this->getUniverse())) {
            return $this->getUniverse()->getLanguage();
        }
        if (!is_null($this->getEditor())) {
            return $this->getEditor()->getLanguage();
        }
        return null;
    }

    public function getDefaultEditor()
    {
        if (!is_null($this->getSeries())) {
            return $this->getSeries()->getEditor();
        }
        return null;
    }

    public function getDefaultCollection()
    {
        if (!is_null($this->getSeries())) {
            return $this->getSeries()->getCollection();
        }
        return null;
    }

    public function getDefaultUniverse()
    {
        if (!is_null($this->getSeries())) {
            return $this->getSeries()->getUniverse();
        }
        return null;
    }

    public function getDefaultAuthors()
    {
        $authors = null;
        if (!is_null($this->getSeries())) {
            $authors = $this->getSeries()->getAuthors();
        }
        if (!is_null($this->getUniverse())) {
            $authors = $this->getUniverse()->getAuthors();
        }
        if ($authors !== null) {
            return $authors;
        }
        return null;
    }

    public function getDefaultGenres()
    {
        if (!is_null($this->getSeries())) {
            return $this->getSeries()->getGenres();
        }
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
}
