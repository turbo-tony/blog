<?php
/**
 * Contains the Band Trait for entity classes
 *
 * @author      Antoine Bousquet <antoine.p.bousquet@gmail.com>
 * @copyright   ABPlus 2016
 * @package     Blog
 * @subpackage  AppBundle
 * @category    EntityTrait
 */

namespace AppBundle\Entity\Traits;

use AppBundle\Entity\Issue;

/**
 * Issue Trait for entity classes
 *
 * @author      Antoine Bousquet <antoine.p.bousquet@gmail.com>
 * @package     Blog
 * @subpackage  AppBundle
 * @category    EntityTrait
 */
Trait IssueTrait
{
    /**
     * Issue
     *
     * @var Issue
     */
    protected $issue;

    /**
     * Set Issue
     *
     * @param Issue $issue
     * @return $this
     */
    public function setIssue(Issue $issue = null)
    {
        $this->issue = $issue;

        return $this;
    }

    /**
     * Get Issue
     *
     * @return Issue
     */
    public function getIssue()
    {
        return $this->issue;
    }
}
