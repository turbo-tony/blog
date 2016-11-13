<?php

namespace AppBundle\Entity;

use ABPlus\CoreBundle\Entity\Traits\IdTrait;
use ABPlus\CoreBundle\Entity\Traits\LabelTrait;
use ABPlus\CoreBundle\Entity\Traits\ParentTrait;
use AppBundle\Entity\Traits\MediumTrait;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Genre
 */
class Genre extends GenreCollection
{
    use IdTrait, LabelTrait, MediumTrait, ParentTrait;

    /**
     * @var string
     */
    protected $description;

    /**
     *
     * @var ArrayCollection
     */
    protected $children;

    public function __construct(array $genres = array())
    {
        parent::__construct($genres);
        $this->children = new ArrayCollection();
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Genre
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function setChildren($children)
    {
        $this->setGenres($children);
    }

    public function getChildren()
    {
        return $this->getGenres();
    }
}
