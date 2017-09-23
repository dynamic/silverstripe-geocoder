<?php

namespace Dynamic\SilverStripeGeocoder\Tests;

use Dynamic\SilverStripeGeocoder\TestOnly\TestLocation;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class AddressDataExtensionTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = 'fixtures.yml';

    /**
     * @var array
     */
    protected static $extra_dataobjects = [
        TestLocation::class,
    ];

    /**
     *
     */
    public function testUpdateCMSFields()
    {
        $object = $this->objFromFixture(TestLocation::class, 'dynamic');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
    }

    /**
     *
     */
    public function testGetFullAddress()
    {

    }

    /**
     *
     */
    public function testHasAddress()
    {

    }
}