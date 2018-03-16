<?php

namespace OpgTest\Refunds\Caseworker\DataModel\Applications;

use DateTime;
use Opg\Refunds\Caseworker\DataModel\Cases\Poa;
use Opg\Refunds\Caseworker\DataModel\Cases\Verification;
use OpgTest\Refunds\Caseworker\DataModel\AbstractDataModelTestCase;

class PoaTest extends AbstractDataModelTestCase
{
    public function testIsCompleteFalseEmptyCaseNumber()
    {
        $poa = (new Poa())
            ->setReceivedDate(new DateTime())
            ->setOriginalPaymentAmount(Poa::ORIGINAL_PAYMENT_AMOUNT_OR_MORE);

        $result = $poa->isComplete();

        $this->assertFalse($result);
    }

    public function testIsCompleteFalseEmptyReceivedDate()
    {
        $poa = (new Poa())
            ->setCaseNumber('1234567/1')
            ->setOriginalPaymentAmount(Poa::ORIGINAL_PAYMENT_AMOUNT_OR_MORE);

        $result = $poa->isComplete();

        $this->assertFalse($result);
    }

    public function testIsCompleteFalseEmptyOriginalPaymentAmount()
    {
        $poa = (new Poa())
            ->setCaseNumber('1234567/1')
            ->setReceivedDate(new DateTime());

        $result = $poa->isComplete();

        $this->assertFalse($result);
    }

    public function testIsCompleteTrueNoAttorneyValidation()
    {
        $poa = (new Poa())
            ->setCaseNumber('1234567/1')
            ->setReceivedDate(new DateTime())
            ->setOriginalPaymentAmount(Poa::ORIGINAL_PAYMENT_AMOUNT_OR_MORE);

        $result = $poa->isComplete();

        $this->assertTrue($result);
    }

    public function testIsCompleteTrueAttorneyValidation()
    {
        $poa = (new Poa())
            ->setCaseNumber('1234567/1')
            ->setReceivedDate(new DateTime())
            ->setOriginalPaymentAmount(Poa::ORIGINAL_PAYMENT_AMOUNT_OR_MORE);

        $poa->setVerifications([
            (new Verification())->setType(Verification::TYPE_ATTORNEY_NAME),
            (new Verification())->setType(Verification::TYPE_ATTORNEY_DOB)
        ]);

        $result = $poa->isComplete();

        $this->assertTrue($result);
    }

    public function testIsCompleteFalsePartialAttorneyValidation()
    {
        $poa = (new Poa())
            ->setCaseNumber('1234567/1')
            ->setReceivedDate(new DateTime())
            ->setOriginalPaymentAmount(Poa::ORIGINAL_PAYMENT_AMOUNT_OR_MORE);

        $poa->setVerifications([
            (new Verification())->setType(Verification::TYPE_ATTORNEY_NAME)
        ]);

        $result = $poa->isComplete();

        $this->assertFalse($result);

        $poa->setVerifications([
            (new Verification())->setType(Verification::TYPE_ATTORNEY_DOB)
        ]);

        $result = $poa->isComplete();

        $this->assertFalse($result);
    }
}