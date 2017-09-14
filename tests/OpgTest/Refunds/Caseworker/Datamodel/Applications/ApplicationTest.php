<?php

namespace OpgTest\Refunds\Caseworker\DataModel\Applications;

use Opg\Refunds\Caseworker\DataModel\Applications\Account;
use Opg\Refunds\Caseworker\DataModel\Applications\Application;
use Opg\Refunds\Caseworker\DataModel\Applications\Attorney;
use Opg\Refunds\Caseworker\DataModel\Applications\Contact;
use Opg\Refunds\Caseworker\DataModel\Applications\Donor;
use Opg\Refunds\Caseworker\DataModel\Applications\Verification;
use OpgTest\Refunds\Caseworker\DataModel\AbstractDataModelTestCase;
use DateTime;

class ApplicationTest extends AbstractDataModelTestCase
{
    /**
     * @var Donor
     */
    private $donor;

    /**
     * @var Attorney
     */
    private $attorney;

    /**
     * @var Contact
     */
    private $contact;

    /**
     * @var Verification
     */
    private $verification;

    /**
     * @var Account
     */
    private $account;

    public function setUp()
    {
        //  Set up the data entities to reuse
        $this->donor = new Donor([
            'name' => [
                'title' => 'Dr',
                'first' => 'Ross',
                'last'  => 'Gellar',
            ],
            'dob'  => $this->dateTimeToString(new DateTime('1966-11-02')),
        ]);

        $this->attorney = new Attorney([
            'name' => [
                'title' => 'Miss',
                'first' => 'Monica',
                'last'  => 'Gellar',
            ],
            'dob'  => $this->dateTimeToString(new DateTime('1964-06-15')),
        ]);

        $this->contact = new Contact([
            'email'  => 'ross@friends.com',
            'mobile' => '07712 123456',
        ]);

        $this->verification = new Verification([
            'case-number'       => '123456789',
            'donor-postcode'    => 'AB1 2CD',
            'attorney-postcode' => 'WX9 8YZ',
        ]);

        $this->account = new Account([
            'name' => 'DR R GELLAR',
        ]);
    }

    public function testGetsAndSets()
    {
        $model = new Application();

        $now = new DateTime();

        $model->setApplicant('Ross Gellar')
              ->setDonor($this->donor)
              ->setAttorney($this->attorney)
              ->setContact($this->contact)
              ->setVerification($this->verification)
              ->setAccount($this->account)
              ->setSubmitted($now)
              ->setExpected($now);

        $this->assertEquals('Ross Gellar', $model->getApplicant());
        $this->assertEquals($this->donor, $model->getDonor());
        $this->assertEquals($this->attorney, $model->getAttorney());
        $this->assertEquals($this->contact, $model->getContact());
        $this->assertEquals($this->verification, $model->getVerification());
        $this->assertEquals($this->account, $model->getAccount());
        $this->assertEquals($now, $model->getSubmitted());
        $this->assertEquals($now, $model->getExpected());
    }

    public function testPopulateAndToArray()
    {
        $now = new DateTime();

        $data = [
            'applicant'    => 'Ross Gellar',
            'donor'        => $this->donor->toArray(),
            'attorney'     => $this->attorney->toArray(),
            'contact'      => $this->contact->toArray(),
            'verification' => $this->verification->toArray(),
            'account'      => $this->account->toArray(),
            'submitted'    => $this->dateTimeToString($now),
            'expected'     => $this->dateTimeToString($now),
        ];

        $model = new Application($data);

        $this->assertSame($data, $model->toArray());
    }
}
