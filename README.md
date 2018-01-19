# SilverStripe Geocoder

SilverStripe wrapper for [Geocoder](https://github.com/geocoder-php/Geocoder)

[![Build Status](https://travis-ci.org/dynamic/silverstripe-geocoder.svg?branch=master)](https://travis-ci.org/dynamic/silverstripe-geocoder)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dynamic/silverstripe-geocoder/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/dynamic/silverstripe-geocoder/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/dynamic/silverstripe-geocoder/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/dynamic/silverstripe-geocoder/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/dynamic/silverstripe-geocoder/badges/build.png?b=master)](https://scrutinizer-ci.com/g/dynamic/silverstripe-geocoder/build-status/master)
[![codecov](https://codecov.io/gh/dynamic/silverstripe-geocoder/branch/master/graph/badge.svg)](https://codecov.io/gh/dynamic/silverstripe-geocoder)

## Requirements

- SilverStripe 4.0

## Installation

`composer require dynamic/silverstripe-geocoder`

## Example usage

in `mysite/_config/config.yml`:

```
SilverStripe\ORM\DataObject:
  extensions:
    - Dynamic\SilverStripeGeocoder\AddressDataExtension
    - Dynamic\SilverStripeGeocoder\DistanceDataExtension
```

## Documentation

See the [docs/en](docs/en/index.md) folder.
