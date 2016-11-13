<?php
/**
 * File containing the Editor entity
 *
 * @category   Model
 * @package    Blog
 * @subpackage CoreBundle
 * @author     Antoine Bousquet <antoine.p.bousquet@gmail.com>
 */

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\CountryTrait;

use AppBundle\Entity\Traits\GenresTrait;
use AppBundle\Entity\Traits\LanguageTrait;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Editor model
 *
 * Represents any edition society able to release issues of any possible media.
 * Can be a record label, a book editor, a film production company or any other
 * entertainment society.
 *
 * @category   Controller
 * @package    Blog
 * @subpackage AdminBundle
 * @version    1.0
 * @author     Antoine Bousquet <antoine.p.bousquet@gmail.com>
 */
class Editor extends Company
{
    use CountryTrait, LanguageTrait, GenresTrait;

    /**
     * Issue types that the editor generally produces
     *
     * Refers to specific types of media.
     *
     * @var array|\Traversable Collection of issue types
     */
    private $issueTypes;

    /**
     * Genres that the editor generally produces
     *
     * The genres are grouped by genre categories. Depending on the associated issue
     * types, only some genre categories will be available. For instance, the musical
     * genres "Rock", "Jazz" or "Blues" are only available if the editor has the
     * "Record" issue type.
     *
     * @var array|\Traversable Collection of genres
     */

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->issueTypes = new ArrayCollection();
        $this->genres = new ArrayCollection();
    }

    /**
     * Get the default language
     *
     * This method is mandatory if we want to associate a defaultable form type
     * extension on the 'language' field.
     *
     * @return string|null
     */
    public function getDefaultLanguage()
    {
        if (!is_null($this->getCountry())) {
            return $this->getCountry()->getMainLanguage();
        }
        return null;
    }

    /**
     * Set all issue types in a single call
     *
     * @param array $issueTypes Collection of {@see IssueType} instances
     * @return $this
     */
    public function setIssueTypes($issueTypes)
    {
        $this->issueTypes = $issueTypes;

        return $this;
    }

    /**
     * Get all issue types
     *
     * @return array Collection of {@see IssueType} instances
     */
    public function getIssueTypes()
    {
        return $this->issueTypes;
    }
}
