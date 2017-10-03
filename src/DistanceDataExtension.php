<?php

namespace Dynamic\SilverStripeGeocoder;

use Dynamic\SilverStripeGeocoder\GoogleGeocoder;
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
        $address = Controller::curr()->getRequest()->getVar('address');
        if ($this->owner->hasMethod('updateAddressValue')) {
            $address = $this->owner->updateAddressValue($address);
        }

        // switch between miles and kilometers
        $unit = Controller::curr()->getRequest()->getVar('unit');
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
