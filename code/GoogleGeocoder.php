<?php

namespace Dynamic\SilverStripeGeocoder;

use \Geocoder\Provider\GoogleMaps;
use \SilverStripe\Core\Config\Config;

/**
 * Class GoogleGeocoder
 * @package Dynamic\SilverStripeGeocoder
 */
class GoogleGeocoder
{
    /**
     * @var
     */
    private $client;

    /**
     * @var
     */
    private $results;

    /**
     * GoogleGeocoder constructor.
     * @param $address
     */
    public function __construct($address)
    {
        $adapter  = new GeocoderAdapter();
        $adapter = $adapter->getAdapter();
        $geocoder = new GoogleMaps(
            $adapter,
            null,
            null,
            false,
            Config::inst()->get('SilverStripeGeocoder', 'geocoder_api_key')
        );

        $this->setClient($geocoder);
        $this->setResults($address);
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param $client
     * @return $this
     */
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @param $address
     * @return $this
     */
    public function setResults($address)
    {
        $client = $this->getClient();
        $this->results = $client->geocode($address);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->getResults()->get(0);
    }
}
