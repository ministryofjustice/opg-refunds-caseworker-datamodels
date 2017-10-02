<?php

namespace Opg\Refunds\Caseworker\DataModel\Applications;

use DateTime;
use Opg\Refunds\Caseworker\DataModel\Common\Address;
use Opg\Refunds\Caseworker\DataModel\Common\Name;

class Current
{
    /**
     * @var Name
     */
    protected $name;

    /**
     * @var Address
     */
    protected $address;

    /**
     * @var DateTime
     */
    protected $dob;

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @param Name $name
     * @return $this
     */
    public function setName(Name $name): Current
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return $this
     */
    public function setAddress(Address $address): Current
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDob(): DateTime
    {
        return $this->dob;
    }

    /**
     * @param DateTime $dob
     * @return $this
     */
    public function setDob(DateTime $dob): Current
    {
        $this->dob = $dob;

        return $this;
    }
}