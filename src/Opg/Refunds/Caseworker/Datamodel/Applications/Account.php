<?php

namespace Opg\Refunds\Caseworker\DataModel\Applications;

use Opg\Refunds\Caseworker\DataModel\AbstractDataModel;

class Account extends AbstractDataModel
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }
}