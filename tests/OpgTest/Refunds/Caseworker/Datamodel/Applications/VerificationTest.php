<?php

namespace OpgTest\Refunds\Caseworker\DataModel\Applications;

use Opg\Refunds\Caseworker\DataModel\Applications\Verification;
use OpgTest\Refunds\Caseworker\DataModel\AbstractDataModelTestCase;

class VerificationTest extends AbstractDataModelTestCase
{

    protected $caseNumber;

    /**
     * @var string
     */
    protected $donorPostcode;

    /**
     * @var string
     */
    protected $attorneyPostcode;


    public function testGetsAndSets()
    {
        $model = new Verification();

        $model->setCaseNumber('123456789')
              ->setDonorPostcode('AB1 2CD')
              ->setAttorneyPostcode('WX8 YZ9');

        $this->assertEquals('123456789', $model->getCaseNumber());
        $this->assertEquals('AB1 2CD', $model->getDonorPostcode());
        $this->assertEquals('WX8 YZ9', $model->getAttorneyPostcode());
    }

    public function testPopulateAndToArray()
    {
        $data = [
            'case-number'       => '123456789',
            'donor-postcode'    => 'AB1 2CD',
            'attorney-postcode' => 'WX8 YZ9',
        ];

        $model = new Verification($data);

        $this->assertSame($data, $model->toArray());
    }
}
