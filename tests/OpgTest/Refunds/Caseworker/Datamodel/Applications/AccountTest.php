<?php

namespace OpgTest\Refunds\Caseworker\DataModel\Applications;

use Opg\Refunds\Caseworker\DataModel\Applications\Account;
use OpgTest\Refunds\Caseworker\DataModel\AbstractDataModelTestCase;

class AccountTest extends AbstractDataModelTestCase
{
    public function testGetsAndSets()
    {
        $model = new Account();

        $model->setName('Phoebe Buffay');

        $this->assertEquals('Phoebe Buffay', $model->getName());
    }

    public function testPopulateAndToArray()
    {
        $data = [
            'name' => 'Phoebe Buffay',
        ];

        $model = new Account($data);

        $this->assertSame($data, $model->toArray());
    }
}
