<?php

namespace Dynamic\SilverStripeGeocoder\TestOnly;

use Dynamic\SilverStripeGeocoder\AddressDataExtension;
use SilverStripe\Dev\TestOnly;
use SilverStripe\ORM\DataObject;

class TestLocation extends DataObject implements TestOnly
{
    /**
     * @var array
     */
    private static $extensions = [
        AddressDataExtension::class,
    ];
}