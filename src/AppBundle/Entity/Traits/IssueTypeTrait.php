<?php
/**
 * Contains the Issue Type Trait for entity classes
 *
 * @author      Antoine Bousquet <antoine.p.bousquet@gmail.com>
 * @copyright   ABPlus 2016
 * @package     Blog
 * @subpackage  AppBundle
 * @category    EntityTrait
 */

namespace AppBundle\Entity\Traits;

use AppBundle\Entity\IssueType;

/**
 * Issue Type Trait for entity classes
 *
 * @author      Antoine Bousquet <antoine.p.bousquet@gmail.com>
 * @package     Blog
 * @subpackage  AppBundle
 * @category    EntityTrait
 */
Trait IssueTypeTrait
{
    /**
     * IssueType
     *
     * @var IssueType
     */
    protected $issueType;

    /**
     * Set IssueType
     *
     * @param IssueType $issueType
     * @return $this
     */
    public function setIssueType(IssueType $issueType = null)
    {
        $this->issueType = $issueType;

        return $this;
    }

    /**
     * Get IssueType
     *
     * @return IssueType
     */
    public function getIssueType()
    {
        return $this->issueType;
    }
}
