<?php

namespace Dynamic\SilverStripeGeocoder\Tests;

use Dynamic\SilverStripeGeocoder\AddressDataExtension;
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
     * @var \string[][]
     */
    protected static $required_extensions = [
        TestLocation::class => [
            AddressDataExtension::class,
        ],
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
    public function testGetMapStyleJSON()
    {
        $object = $this->objFromFixture(TestLocation::class, 'dynamic');
        $this->assertFalse($object->getMapStyleJSON());
    }

    /**
     *
     */
    public function testGetIconImage()
    {
        $object = $this->objFromFixture(TestLocation::class, 'dynamic');
        $this->assertFalse($object->getIconImage());
    }

    /**
     *
     */
    public function testMapStylesUrlArgs()
    {
        $object = $this->objFromFixture(TestLocation::class, 'dynamic');
        $json = '[{"elementType":"geometry","stylers":[{"color":"#ebe3cd"}]},{"featureType":"administrative",
            "elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":
            "geometry.stroke","stylers":[{"color":"#c9b2a6"}]}]';
        $args = $object->mapStylesURLArgs($json);

        $expected = 'style=feature:all|element:geometry|color:0xebe3cd&style=feature:administrative|element:geometry|visibility:off&style=feature:administrative|element:geometry.stroke|color:0xc9b2a6';
        $this->assertEquals($expected, $args);
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
