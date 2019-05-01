# SilverStripe Geocoder

SilverStripe wrapper for [Geocoder](https://github.com/geocoder-php/Geocoder)

[![Build Status](https://travis-ci.org/dynamic/silverstripe-geocoder.svg?branch=master)](https://travis-ci.org/dynamic/silverstripe-geocoder)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dynamic/silverstripe-geocoder/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/dynamic/silverstripe-geocoder/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/dynamic/silverstripe-geocoder/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/dynamic/silverstripe-geocoder/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/dynamic/silverstripe-geocoder/badges/build.png?b=master)](https://scrutinizer-ci.com/g/dynamic/silverstripe-geocoder/build-status/master)
[![codecov](https://codecov.io/gh/dynamic/silverstripe-geocoder/branch/master/graph/badge.svg)](https://codecov.io/gh/dynamic/silverstripe-geocoder)

[![Latest Stable Version](https://poser.pugx.org/dynamic/silverstripe-geocoder/v/stable)](https://packagist.org/packages/dynamic/silverstripe-geocoder)
[![Total Downloads](https://poser.pugx.org/dynamic/silverstripe-geocoder/downloads)](https://packagist.org/packages/dynamic/silverstripe-geocoder)
[![Latest Unstable Version](https://poser.pugx.org/dynamic/silverstripe-geocoder/v/unstable)](https://packagist.org/packages/dynamic/silverstripe-geocoder)
[![License](https://poser.pugx.org/dynamic/silverstripe-geocoder/license)](https://packagist.org/packages/dynamic/silverstripe-geocoder)

## Requirements

- SilverStripe 4.0

## Installation

`composer require dynamic/silverstripe-geocoder`

## Example usage

in `mysite/_config/config.yml`:

```yml
SilverStripe\ORM\DataObject:
  extensions:
    - Dynamic\SilverStripeGeocoder\AddressDataExtension
    - Dynamic\SilverStripeGeocoder\DistanceDataExtension

Dynamic\SilverStripeGeocoder\GoogleGeocoder:
  geocoder_api_key: 'your-key-here'
```

## Documentation

### AddressDataExtension
The AddressDataExtension adds `Address`, `Address2`, `City`, `State`, `PostalCode`, `Country`, `Lat`, and `Lng` fields.
The `Lat` and `Lng` fields are read only in the cms and are automatically generated on write.
Geocoding can be disabled on a model basis by setting `disable_geocoding` to true.

```yml
SilverStripe\ORM\DataObject:
    disable_geocoding: true
```

#### Static Map Image
In addition to fields the AddressDataExtension also adds a method for rendering a static map image.
Using `$AddressMap` in a template will render the map.
`$AddressMap` also has options to easily modify the width, height, and scale of the map. `$AddressMap(320, 240, 1)`

##### Map Style
The map can be styled by adding a `mapStyle.json` in any of the following folders in a theme: 
```
client/dist/js/
client/dist/javascript/
dist/js/
dist/javascript/
src/javascript/thirdparty
js/
javascript/
```
styles can be generated using an online service like [Styling Wizard: Google Maps APIs](https://mapstyle.withgoogle.com/)

##### Marker Image
**This does not work on local due to google needing to download the image off the server.**

A custom marker image can be used to match the style of the map in about the same way as the style.
An image named `mapIcon` with an extension of `png`, `jpg`, `jpeg`, or `gif` can be put in any of the following folders in a theme: 
```
client/dist/img/
client/dist/images/
dist/img/
dist/images/
img/
images/
```

### DistanceDataExtension
The DistanceDataExtension should be used in conjunction with the AddressDataExtension. 
The only time it is viable by itself is if the extended DataObject has `Lat` and `Lng` fields.

The DistanceDataExtension will add a pseudo field for distance away from an address to a DataObject.
The address to check the distance to is from the current controller initially.
This can be changed by implementing `updateAddressValue($address)` on the DataObject or an extension.

```php
/**
 * Always get the distance from Neuschwanstein Castle
 */
public function updateAddressValue(&$address) {
    $address = 'Neuschwansteinstraße 20, 87645 Schwangau, Germany';
}
```

See the [docs/en](docs/en/index.md) folder.
