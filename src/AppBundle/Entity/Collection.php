<?php

namespace AppBundle\Entity;

use ABPlus\CoreBundle\Entity\Traits\IdTrait;
use ABPlus\CoreBundle\Entity\Traits\NameTrait;
use ABPlus\CoreBundle\Entity\Traits\OriginalNameTrait;
use AppBundle\Entity\Traits\EditorTrait;
use AppBundle\Entity\Traits\GenresTrait;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Collection
 */
class Collection
{
    use IdTrait, NameTrait, OriginalNameTrait, EditorTrait, GenresTrait;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->initGenres();
    }

    public function getDefaultGenres()
    {
        if (!is_null($this->getEditor())) {
            return $this->getEditor()->getGenres();
        }
        return null;
    }
}
