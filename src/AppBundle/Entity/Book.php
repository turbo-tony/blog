<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 */
class Book extends Issue
{
    protected $issueTypeId = IssueType::BOOK;

    /**
     * @var int
     */
    private $pageCount;

    /**
     * @var string
     */
    private $tome;

    /**
     * Set pageCount
     *
     * @param integer $pageCount
     * @return Issue
     */
    public function setPageCount($pageCount)
    {
        $this->pageCount = $pageCount;

        return $this;
    }

    /**
     * Get pageCount
     *
     * @return int
     */
    public function getPageCount()
    {
        return $this->pageCount;
    }

    /**
     * Set tome
     *
     * @param string $tome
     * @return Issue
     */
    public function setTome($tome)
    {
        $this->tome = $tome;

        return $this;
    }

    /**
     * Get tome
     *
     * @return string
     */
    public function getTome()
    {
        return $this->tome;
    }
}
