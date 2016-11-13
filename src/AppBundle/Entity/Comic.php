<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comic
 */
class Comic extends Book
{
    protected $issueTypeId = IssueType::COMIC;
}
