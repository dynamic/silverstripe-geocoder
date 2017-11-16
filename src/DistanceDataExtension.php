<?php

namespace Dynamic\SilverStripeGeocoder;

use SilverStripe\Core\Config\Config;
use SilverStripe\ORM\DataExtension;
use SilverStripe\ORM\Queries\SQLSelect;
use SilverStripe\ORM\DataQuery;
use SilverStripe\Control\Controller;

class DistanceDataExtension extends DataExtension
{
    /**
     * @param SQLSelect $query
     * @param DataQuery|null $dataQuery
     */
    public function augmentSQL(SQLSelect $query, DataQuery $dataQuery = null)
    {
        $addressVar = Config::inst()->get(DistanceDataExtension::class, 'address_var');
        $unitVar = Config::inst()->get(DistanceDataExtension::class, 'unit_var');

        $address = Controller::curr()->getRequest()->getVar($addressVar);
        if ($this->owner->hasMethod('updateAddressValue')) {
            $address = $this->owner->updateAddressValue($address);
        }

        // switch between miles and kilometers
        $unit = Controller::curr()->getRequest()->getVar($unitVar);
        if ($unit == 'km') {
            $unitVal = 6371;
        } else {
            $unitVal = 3959;
        }

        if ($address) { // on frontend
            $geocoder = new GoogleGeocoder($address);
            $response = $geocoder->getResult();
            $Lat = $response->getLatitude();
            $Lng = $response->getLongitude();

            $query
                ->addSelect(array(
                    '( ' . $unitVal . ' * acos( cos( radians(' . $Lat . ') ) * cos( radians( `Lat` ) ) * cos( radians( `Lng` ) - radians(' . $Lng . ') ) + sin( radians(' . $Lat . ') ) * sin( radians( `Lat` ) ) ) ) AS Distance',
                ));
        } else {
            $query->addSelect(array('-1 AS Distance'));
        }
    }
}
