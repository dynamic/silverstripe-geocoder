<?php

namespace Dynamic\SilverStripeGeocoder;

use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\ReadonlyField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;

class AddressDataExtension extends DataExtension
{
    /**
     * @var array
     */
    private static $db = [
        'Address'  => 'Varchar(255)',
        'Address2' => 'Varchar(255)',
        'City'   => 'Varchar(64)',
        'State'    => 'Varchar(64)',
        'PostalCode' => 'Varchar(10)',
        'Country'  => 'Varchar(2)',
        'ShowDirections' => 'Boolean',
        'Lat' => 'Decimal(10,7)',
        'Lng' => 'Decimal(10,7)',
    ];

    /**
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        $tab_name = Config::inst()->get(AddressDataExtension::class,'address_tab_name');

        $fields->addFieldsToTab('Root.' . $tab_name, [
            HeaderField::create('AddressHD', 'Company', 1),
            HeaderField::create('CompanyLocation', 'Company Location', 2),
            LiteralField::create(
                'LocationInfo',
                '<p>Enter your company address information, which will be available throughout your website</p>'
            ),
            TextField::create('Address'),
            TextField::create('Address2', 'Address 2'),
            TextField::create('City'),
            TextField::create('State'),
            TextField::create('PostalCode'),
            TextField::create('Country'),
            CheckboxField::create('ShowDirections', 'Show Map and Driving Directions'),
            ReadonlyField::create('Lat'),
            ReadonlyField::create('Lng')
        ]);
    }

    /**
     * Returns the full address as a simple string.
     *
     * @return string
     */
    public function getFullAddress() {
        $parts = array(
            $this->owner->Address,
            $this->owner->Address2,
            $this->owner->City,
            $this->owner->State,
            $this->owner->PostalCode,
            $this->owner->Country,
        );
        return implode(', ', array_filter($parts));
    }

    /**
     * @return bool
     */
    public function hasAddress() {
        return (
            $this->owner->Address
            && $this->owner->City
            && $this->owner->State
            && $this->owner->PostalCode
        );
    }
    /**
     * Returns TRUE if any of the address fields have changed.
     *
     * @param int $level
     * @return bool
     */
    public function isAddressChanged($level = 1) {
        $fields  = array('Address', 'Address2', 'City', 'State', 'PostalCode', 'Country');
        $changed = $this->owner->getChangedFields(false, $level);
        foreach ($fields as $field) {
            if (array_key_exists($field, $changed)) return true;
        }
        return false;
    }
    /**
     *
     */
    public function onBeforeWrite()
    {
        parent::onBeforeWrite();
        if ($this->hasAddress()) {
            if (!$this->isAddressChanged()) {
                return;
            }
            if ($address = $this->getFullAddress()) {
                $geocoder = new GoogleGeocoder($address);
                $response = $geocoder->getResult();
                $this->owner->Lat = $response->getLatitude();
                $this->owner->Lng = $response->getLongitude();
            }
        }
    }
}