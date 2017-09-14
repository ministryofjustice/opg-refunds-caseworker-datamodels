<?php

namespace Opg\Refunds\Caseworker\DataModel\Applications;

use Opg\Refunds\Caseworker\DataModel\AbstractDataModel;
use DateTime;

/**
 * Class Application
 * @package Opg\Refunds\Caseworker\DataModel\Applications
 */
class Application extends AbstractDataModel
{
    /**
     * @var string
     */
    protected $applicant;

    /**
     * @var Donor
     */
    protected $donor;

    /**
     * @var Attorney
     */
    protected $attorney;

    /**
     * @var Contact
     */
    protected $contact;

    /**
     * @var Verification
     */
    protected $verification;

    /**
     * @var Account
     */
    protected $account;

    /**
     * @var DateTime
     */
    protected $submitted;

    /**
     * @var DateTime
     */
    protected $expected;

    /**
     * Application constructor
     * @param null $data
     */
    public function __construct($data = null)
    {
        $this->verification = new Verification();

        parent::__construct($data);
    }

    /**
     * @return string
     */
    public function getApplicant(): string
    {
        return $this->applicant;
    }

    /**
     * @param string $applicant
     * @return $this
     */
    public function setApplicant(string $applicant)
    {
        $this->applicant = $applicant;

        return $this;
    }

    /**
     * @return Donor
     */
    public function getDonor(): Donor
    {
        return $this->donor;
    }

    /**
     * @param Donor $donor
     * @return $this
     */
    public function setDonor(Donor $donor)
    {
        $this->donor = $donor;

        return $this;
    }

    /**
     * @return Attorney
     */
    public function getAttorney(): Attorney
    {
        return $this->attorney;
    }

    /**
     * @param Attorney $attorney
     * @return $this
     */
    public function setAttorney(Attorney $attorney)
    {
        $this->attorney = $attorney;

        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return $this
     */
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return Verification
     */
    public function getVerification(): Verification
    {
        return $this->verification;
    }

    /**
     * @param Verification $verification
     * @return $this
     */
    public function setVerification(Verification $verification)
    {
        $this->verification = $verification;

        return $this;
    }

    /**
     * @return Account
     */
    public function getAccount(): Account
    {
        return $this->account;
    }

    /**
     * @param Account $account
     * @return $this
     */
    public function setAccount(Account $account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getSubmitted(): DateTime
    {
        return $this->submitted;
    }

    /**
     * @param DateTime $submitted
     * @return $this
     */
    public function setSubmitted(DateTime $submitted)
    {
        $this->submitted = $submitted;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getExpected(): DateTime
    {
        return $this->expected;
    }

    /**
     * @param DateTime $expected
     * @return $this
     */
    public function setExpected(DateTime $expected)
    {
        $this->expected = $expected;

        return $this;
    }

    /**
     * @param array $data
     * @return $this
     */
    protected function populate(array $data)
    {
        foreach ($data as $k => $v) {
            switch ($k) {
                case 'case-number':
                    if ($v['have-poa-case-number'] === 'yes') {
                        $this->verification->setCaseNumber($v['poa-case-number']);
                    }
                    break;
                case 'postcodes':
                    if (in_array('donor-postcode', $v['postcode-options'])) {
                        $this->verification->setDonorPostcode($v['donor-postcode']);
                    }
                    if (in_array('attorney-postcode', $v['postcode-options'])) {
                        $this->verification->setAttorneyPostcode($v['attorney-postcode']);
                    }
                    break;
            }
        }

        return parent::populate($data);
    }

    /**
     * Map properties to correct types
     *
     * @param string $property
     * @param mixed $value
     * @return DateTime|mixed|Account|Attorney|Contact|Donor|Verification
     */
    protected function map($property, $value)
    {
        switch ($property) {
            case 'donor':
                return (($value instanceof Donor || is_null($value)) ? $value : new Donor($value));
            case 'attorney':
                return (($value instanceof Attorney || is_null($value)) ? $value : new Attorney($value));
            case 'contact':
                return (($value instanceof Contact || is_null($value)) ? $value : new Contact($value));
            case 'verification':
                return (($value instanceof Verification || is_null($value)) ? $value : new Verification($value));
            case 'account':
                return (($value instanceof Account || is_null($value)) ? $value : new Account($value));
            case 'submitted':
            case 'expected':
                return (($value instanceof DateTime || is_null($value)) ? $value : new DateTime($value));
            default:
                return parent::map($property, $value);
        }
    }
}
