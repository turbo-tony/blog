<?php

namespace AppBundle\Entity;

use ABPlus\CoreBundle\Entity\Traits\IdTrait;

use ABPlus\CoreBundle\Entity\Traits\NameTrait;
use ABPlus\CoreBundle\Entity\Traits\OriginalNameTrait;
use AppBundle\Entity\Traits\LanguageTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 */
class Country
{
    use IdTrait, NameTrait, OriginalNameTrait, LanguageTrait;

    /**
     * @var string
     */
    protected $fullName;

    /**
     * @var string
     */
    protected $fullOriginalName;

    /**
     * Set fullName
     *
     * @param string $fullName
     * @return $this
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set fullOriginalName
     *
     * @param string $fullOriginalName
     * @return $this
     */
    public function setFullOriginalName($fullOriginalName)
    {
        $this->fullOriginalName = $fullOriginalName;

        return $this;
    }

    /**
     * Get fullOriginalName
     *
     * @return string
     */
    public function getFullOriginalName()
    {
        return $this->fullOriginalName;
    }
}
