<?php
/**
 * Contains the AuthorRole Trait for entity classes
 *
 * @author      Antoine Bousquet <antoine.p.bousquet@gmail.com>
 * @copyright   ABPlus 2016
 * @package     Blog
 * @subpackage  AppBundle
 * @category    EntityTrait
 */

namespace AppBundle\Entity\Traits;

use AppBundle\Entity\AbstractAuthorRole;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AuthorRole Trait for entity classes
 *
 * @author      Antoine Bousquet <antoine.p.bousquet@gmail.com>
 * @package     Blog
 * @subpackage  AppBundle
 * @category    EntityTrait
 */
Trait AuthorRoleTrait
{
    /**
     * Authors / roles relationship
     *
     * @var ArrayCollection
     */
    protected $authors;

    public function initAuthors()
    {
        $this->authors = new ArrayCollection();
    }

    /**
     * Add authors
     *
     * @param AbstractAuthorRole $author
     * @return $this
     */
    public function addAuthor(AbstractAuthorRole $author = null)
    {
        if (!is_null($author) && !$this->authors->contains($author)) {
            $this->authors->add($author);
        }

        return $this;
    }

    /**
     * Remove authors
     *
     * @param AbstractAuthorRole $author
     */
    public function removeAuthor(AbstractAuthorRole $author)
    {
        $this->authors->removeElement($author);
    }

    public function setAuthors($authors)
    {
        $this->authors = $authors;

        return $this;
    }

    /**
     * Get authors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAuthors()
    {
        return $this->authors;
    }
}
