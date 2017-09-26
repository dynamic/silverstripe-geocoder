<?php

namespace Dynamic\SilverStripeGeocoder\TestOnly;

use Dynamic\SilverStripeGeocoder\AddressDataExtension;
use SilverStripe\ORM\DataObject;

class TestLocation extends DataObject
{
    /**
     * @var array
     */
    private static $extensions = [
        AddressDataExtension::class,
    ];
}