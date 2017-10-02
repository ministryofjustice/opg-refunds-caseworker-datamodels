<?php

namespace Opg\Refunds\Caseworker\DataModel\Applications;

use Opg\Refunds\Caseworker\DataModel\Common\Name;

class Poa
{
    /**
     * @var Name
     */
    protected $name;

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
    public function setName(Name $name): Poa
    {
        $this->name = $name;

        return $this;
    }
}