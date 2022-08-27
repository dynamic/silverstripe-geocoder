<?php

namespace Dynamic\SilverStripeGeocoder;

use \Ivory\HttpAdapter\CurlHttpAdapter;

/**
 * Class GeocoderAdapter
 * @package Dynamic\SilverStripeGeocoder
 */
class GeocoderAdapter
{
    /**
     * @var
     */
    private $adapter;

    /**
     * GeocoderAdapter constructor.
     * @param $adapter
     */
    public function __construct($adapter = null)
    {
        if ($adapter === null) {
            $adapter = new \GuzzleHttp\Client();
        }
        $this->setAdapter($adapter);


    }

    /**
     * @return mixed
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * @param $adapter
     * @return $this
     */
    public function setAdapter($adapter)
    {
        $this->adapter = $adapter;
        return $this;
    }
}
