<?php

namespace Opg\Refunds\Caseworker\DataModel\Applications;

use Opg\Refunds\Caseworker\DataModel\AbstractDataModel;

/**
 * Class Verification
 * @package Opg\Refunds\Caseworker\DataModel\Applications
 */
class Verification extends AbstractDataModel
{
    /**
     * @var string
     */
    protected $caseNumber;

    /**
     * @var string
     */
    protected $donorPostcode;

    /**
     * @var string
     */
    protected $attorneyPostcode;

    /**
     * @return string
     */
    public function getCaseNumber(): string
    {
        return $this->caseNumber;
    }

    /**
     * @param string $caseNumber
     * @return $this
     */
    public function setCaseNumber(string $caseNumber)
    {
        $this->caseNumber = $caseNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getDonorPostcode(): string
    {
        return $this->donorPostcode;
    }

    /**
     * @param string $donorPostcode
     * @return $this
     */
    public function setDonorPostcode(string $donorPostcode)
    {
        $this->donorPostcode = $donorPostcode;

        return $this;
    }

    /**
     * @return string
     */
    public function getAttorneyPostcode(): string
    {
        return $this->attorneyPostcode;
    }

    /**
     * @param string $attorneyPostcode
     * @return $this
     */
    public function setAttorneyPostcode(string $attorneyPostcode)
    {
        $this->attorneyPostcode = $attorneyPostcode;

        return $this;
    }
}
