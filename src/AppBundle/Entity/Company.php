<?php

namespace AppBundle\Entity;
use ABPlus\CoreBundle\Entity\Traits\IdTrait;
use ABPlus\CoreBundle\Entity\Traits\NameTrait;
use ABPlus\CoreBundle\Entity\Traits\OriginalNameTrait;
use ABPlus\CoreBundle\Entity\Traits\ParentTrait;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Company
 */
class Company
{
    use IdTrait, NameTrait, OriginalNameTrait, ParentTrait;

    protected $children;

    /**
     * Year during which the company was created
     *
     * @var int 4-digits figure
     */
    protected $creationYear;

    /**
     * Year during which the company closed
     *
     * @var int 4-digits figure
     */
    protected $closingYear;

    public function __construct()
    {
        $this->children = new ArrayCollection();
    }

    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set creationYear
     *
     * @param int $creationYear
     * @return $this
     */
    public function setCreationYear($creationYear)
    {
        $this->creationYear = $creationYear;

        return $this;
    }

    /**
     * Get creationYear
     *
     * @return int
     */
    public function getCreationYear()
    {
        return $this->creationYear;
    }

    /**
     * Set closingYear
     *
     * @param int $closingYear
     * @return $this
     */
    public function setClosingYear($closingYear)
    {
        $this->closingYear = $closingYear;

        return $this;
    }

    /**
     * Get closingYear
     *
     * @return int
     */
    public function getClosingYear()
    {
        return $this->closingYear;
    }
}
