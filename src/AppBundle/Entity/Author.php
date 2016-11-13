<?php

namespace AppBundle\Entity;

use ABPlus\CoreBundle\Entity\Traits\IdTrait;

use AppBundle\Entity\Traits\CountryTrait;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Author
 */
class Author
{
    use IdTrait, CountryTrait;

    /**
     * @var string
     */
    protected $penName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $fullName;

    /**
     * @var \DateTime
     */
    protected $birthDate;

    /**
     * @var \DateTime
     */
    protected $deathDate;

    /**
     * @var Role
     */
    protected $defaultRole;

    public function __construct()
    {
        // $this->lifeDates = new DateRange();
    }

    /**
     * Set penName
     *
     * @param string $penName
     * @return $this
     */
    public function setPenName($penName)
    {
        $this->penName = $penName;

        return $this;
    }

    /**
     * Get penName
     *
     * @return string
     */
    public function getPenName()
    {
        return $this->penName;
    }

    /**
     * Set first name
     *
     * @param string $firstName
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get first name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set last name
     *
     * @param string $lastName
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

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
     * Set birthDate
     *
     * @param \DateTime $birthDate
     * @return $this
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
        // $this->lifeDates->setMin($birthDate);

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
        // return $this->lifeDates->getMin();
    }

    /**
     * Set deathDate
     *
     * @param \DateTime $deathDate
     * @return $this
     */
    public function setDeathDate($deathDate)
    {
        $this->deathDate = $deathDate;
        // $this->lifeDates->setMax($deathDate);

        return $this;
    }

    /**
     * Get deathDate
     *
     * @return \DateTime
     */
    public function getDeathDate()
    {
        return $this->deathDate;
        // return $this->lifeDates->getMax();
    }

    public function getResolvedName()
    {
        if (!is_null($this->getPenName())) {
            return $this->getPenName();
        }
        if (!is_null($this->getFullName())) {
            return $this->getFullName();
        }
        $name = '';
        if (!is_null($this->getFirstName())) {
            $name = $this->getFirstName();
            if (!is_null($this->getLastName())) {
                $name .= ' ';
            }
        }
        if (!is_null($this->getLastName())) {
            $name .= $this->getLastName();
        }
        return $name;
    }

    /**
     * Set role
     *
     * @param Role $role
     * @return $this
     */
    public function setDefaultRole($role)
    {
        $this->defaultRole = $role;

        return $this;
    }

    /**
     * Get default role
     *
     * @return Role
     */
    public function getDefaultRole()
    {
        return $this->defaultRole;
    }

    /*
    public function setLifeDates($lifeDates)
    {
        // $this->lifeDates = $lifeDates;

        if (!($lifeDates instanceof DateRange)) {
            $lifeDates = new DateRange();
        }

        $this->setBirthDate($lifeDates->getMin());
        $this->setDeathDate($lifeDates->getMax());

        return $this;
    }

    public function getLifeDates()
    {
        // return $this->lifeDates;
        return new DateRange($this->getBirthDate(), $this->getDeathDate());
    }
    */

    /**
     * Ensures that the current author can be identified by at least one piece of name
     *
     * @param ExecutionContextInterface $context
     * @param array $errorMessages
     * @return void
     */
    public function isValid(ExecutionContextInterface $context, array $errorMessages)
    {
        $rName = $this->getResolvedName();

        if (empty($rName)) {
            $context->addViolation($errorMessages['name']);
        }
    }
}
