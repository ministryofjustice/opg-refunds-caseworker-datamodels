<?php

namespace Opg\Refunds\Caseworker\DataModel\Applications;

use Opg\Refunds\Caseworker\DataModel\AbstractDataModel;
use Opg\Refunds\Caseworker\DataModel\Common\Name;
use DateTime;

class Attorney extends AbstractDataModel
{
    /**
     * @var Name
     */
    protected $name;

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
     */
    public function setName(Name $name)
    {
        $this->name = $name;
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
     */
    public function setDob(DateTime $dob)
    {
        $this->dob = $dob;
    }

    protected function map($property, $value)
    {
        switch ($property) {
            case 'name':
                return (($value instanceof Name || is_null($value)) ? $value : new Name($value));
            case 'dob':
                return (($value instanceof DateTime || is_null($value)) ? $value : new DateTime($value));
            default:
                return parent::map($property, $value);
        }
    }
}