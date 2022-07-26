# Changelog

## [1.3.0](https://github.com/dynamic/silverstripe-geocoder/tree/1.3.0) (2022-07-26)

## What's Changed
* REFACTOR PHP8 compatibility by @jsirish in https://github.com/dynamic/silverstripe-geocoder/pull/55


**Full Changelog**: https://github.com/dynamic/silverstripe-geocoder/compare/1.2.0...1.3.0

## [1.2.0](https://github.com/dynamic/silverstripe-geocoder/tree/1.2.0) (2020-08-03)

[Full Changelog](https://github.com/dynamic/silverstripe-geocoder/compare/1.1.1...1.2.0)

**Closed issues:**

- FEATURE Allow user to override lat and lng [\#53](https://github.com/dynamic/silverstripe-geocoder/issues/53)

**Merged pull requests:**

- FEATURE LatLngOverride [\#54](https://github.com/dynamic/silverstripe-geocoder/pull/54) ([jsirish](https://github.com/jsirish))

## [1.1.1](https://github.com/dynamic/silverstripe-geocoder/tree/1.1.1) (2020-01-09)

[Full Changelog](https://github.com/dynamic/silverstripe-geocoder/compare/1.1.0...1.1.1)

**Implemented enhancements:**

- REFACTOR Geocoding - don't attempt to generate coordinates if geocoding key is missing [\#47](https://github.com/dynamic/silverstripe-geocoder/issues/47)

**Merged pull requests:**

- BUGFIX AddressDataExtension onBeforeWrite - check if geocoding key is… [\#52](https://github.com/dynamic/silverstripe-geocoder/pull/52) ([jsirish](https://github.com/jsirish))

## [1.1.0](https://github.com/dynamic/silverstripe-geocoder/tree/1.1.0) (2019-11-19)

[Full Changelog](https://github.com/dynamic/silverstripe-geocoder/compare/1.0.2...1.1.0)

**Implemented enhancements:**

- REFACTOR Remove StateDropdownField as a default in CMS [\#45](https://github.com/dynamic/silverstripe-geocoder/issues/45)

**Fixed bugs:**

- REFACTOR AddressDataExtension::hasAddress\(\) - allow for State, PostalCode or Country [\#46](https://github.com/dynamic/silverstripe-geocoder/issues/46)

**Closed issues:**

- 1.2.0 [\#48](https://github.com/dynamic/silverstripe-geocoder/issues/48)
- FEATURE Github Issue templates [\#44](https://github.com/dynamic/silverstripe-geocoder/issues/44)

**Merged pull requests:**

- REFACTOR AddressDataExtension - remove StateDropdownField [\#51](https://github.com/dynamic/silverstripe-geocoder/pull/51) ([jsirish](https://github.com/jsirish))
- DOCS add Github templates [\#50](https://github.com/dynamic/silverstripe-geocoder/pull/50) ([jsirish](https://github.com/jsirish))
- REFACTOR AddressDataExtension::hasAddress\(\) [\#49](https://github.com/dynamic/silverstripe-geocoder/pull/49) ([jsirish](https://github.com/jsirish))

## [1.0.2](https://github.com/dynamic/silverstripe-geocoder/tree/1.0.2) (2019-10-29)

[Full Changelog](https://github.com/dynamic/silverstripe-geocoder/compare/1.0.1...1.0.2)

**Fixed bugs:**

- BUG Coordinates are not calculated if Location is missing postal code. Not all cities have postal codes [\#42](https://github.com/dynamic/silverstripe-geocoder/issues/42)

**Merged pull requests:**

- BUGFIX AddressDataExtension - hasAddress\(\) [\#43](https://github.com/dynamic/silverstripe-geocoder/pull/43) ([jsirish](https://github.com/jsirish))

## [1.0.1](https://github.com/dynamic/silverstripe-geocoder/tree/1.0.1) (2019-08-27)

[Full Changelog](https://github.com/dynamic/silverstripe-geocoder/compare/1.0.0...1.0.1)

**Implemented enhancements:**

- Tag a release [\#35](https://github.com/dynamic/silverstripe-geocoder/issues/35)

**Closed issues:**

- FEATURE Location - implement Address 2 field [\#37](https://github.com/dynamic/silverstripe-geocoder/issues/37)
- Note somewhere in the docs that markers for static maps don't work on private sites [\#32](https://github.com/dynamic/silverstripe-geocoder/issues/32)
- Add documentation for model level disabling of geocoding [\#31](https://github.com/dynamic/silverstripe-geocoder/issues/31)

**Merged pull requests:**

- FEATURE AddressDataExtension - CountryDropdownField [\#41](https://github.com/dynamic/silverstripe-geocoder/pull/41) ([jsirish](https://github.com/jsirish))
- Update CI tests [\#39](https://github.com/dynamic/silverstripe-geocoder/pull/39) ([jsirish](https://github.com/jsirish))
- FEATURE AddressDataExtension - Address2 label [\#38](https://github.com/dynamic/silverstripe-geocoder/pull/38) ([jsirish](https://github.com/jsirish))
- Changed front end maps to use a different api key [\#36](https://github.com/dynamic/silverstripe-geocoder/pull/36) ([mak001](https://github.com/mak001))
- ENHANCEMENT state and country dropdown fields [\#20](https://github.com/dynamic/silverstripe-geocoder/pull/20) ([muskie9](https://github.com/muskie9))

## [1.0.0](https://github.com/dynamic/silverstripe-geocoder/tree/1.0.0) (2019-05-08)

[Full Changelog](https://github.com/dynamic/silverstripe-geocoder/compare/05d0dd93d2b1d28ad4fb46a5bba28c458eaa5423...1.0.0)

**Implemented enhancements:**

- Migrate AddressDataExtension and DistanceDataExtension from Locator [\#4](https://github.com/dynamic/silverstripe-geocoder/issues/4)
- FEATURE Use dynamic/silverstripe-country-dropdown-field for Country field [\#40](https://github.com/dynamic/silverstripe-geocoder/issues/40)
- ENHANCEMENT allow model lever override of address\_tab\_name [\#29](https://github.com/dynamic/silverstripe-geocoder/pull/29) ([muskie9](https://github.com/muskie9))

**Closed issues:**

- marker icon should have option to only get PNG, JPEG or GIF formats [\#27](https://github.com/dynamic/silverstripe-geocoder/issues/27)
- TestLocation - implements TestOnly [\#8](https://github.com/dynamic/silverstripe-geocoder/issues/8)
- UPDATE psr-4 autoload [\#1](https://github.com/dynamic/silverstripe-geocoder/issues/1)

**Merged pull requests:**

- Updated docs [\#33](https://github.com/dynamic/silverstripe-geocoder/pull/33) ([mak001](https://github.com/mak001))
- ENHANCEMENT allow model level disabling of geocoding [\#30](https://github.com/dynamic/silverstripe-geocoder/pull/30) ([muskie9](https://github.com/muskie9))
- Fixed static maps not using proper image types for markers [\#28](https://github.com/dynamic/silverstripe-geocoder/pull/28) ([mak001](https://github.com/mak001))
- Added svg to the accepted image types for the marker image [\#26](https://github.com/dynamic/silverstripe-geocoder/pull/26) ([mak001](https://github.com/mak001))
- Style error fix [\#25](https://github.com/dynamic/silverstripe-geocoder/pull/25) ([mak001](https://github.com/mak001))
- Map style [\#24](https://github.com/dynamic/silverstripe-geocoder/pull/24) ([mak001](https://github.com/mak001))
- README - added config for Google API key [\#22](https://github.com/dynamic/silverstripe-geocoder/pull/22) ([jsirish](https://github.com/jsirish))
- Added method to get a static map [\#21](https://github.com/dynamic/silverstripe-geocoder/pull/21) ([mak001](https://github.com/mak001))
- README - add packagist badges [\#19](https://github.com/dynamic/silverstripe-geocoder/pull/19) ([jsirish](https://github.com/jsirish))
- Update README.md [\#18](https://github.com/dynamic/silverstripe-geocoder/pull/18) ([hdpero](https://github.com/hdpero))
- Now uses config values to get variable names [\#16](https://github.com/dynamic/silverstripe-geocoder/pull/16) ([mak001](https://github.com/mak001))
- Scrutinizer fix [\#15](https://github.com/dynamic/silverstripe-geocoder/pull/15) ([mak001](https://github.com/mak001))
- Converted to a vendor module [\#14](https://github.com/dynamic/silverstripe-geocoder/pull/14) ([mak001](https://github.com/mak001))
- TestLocation implements TestOnly [\#12](https://github.com/dynamic/silverstripe-geocoder/pull/12) ([jsirish](https://github.com/jsirish))
- Can now calculate distances for miles and kilometers [\#11](https://github.com/dynamic/silverstripe-geocoder/pull/11) ([mak001](https://github.com/mak001))
- README - update example [\#10](https://github.com/dynamic/silverstripe-geocoder/pull/10) ([jsirish](https://github.com/jsirish))
- Feature - allow address tab name to be set via config [\#7](https://github.com/dynamic/silverstripe-geocoder/pull/7) ([jsirish](https://github.com/jsirish))
- Refactor/readme updates [\#6](https://github.com/dynamic/silverstripe-geocoder/pull/6) ([jsirish](https://github.com/jsirish))
- REFACTOR - import Address and Distance extensions [\#5](https://github.com/dynamic/silverstripe-geocoder/pull/5) ([jsirish](https://github.com/jsirish))
- Made Geocoder reference a config key more in line with the locator [\#2](https://github.com/dynamic/silverstripe-geocoder/pull/2) ([mak001](https://github.com/mak001))



\* *This Changelog was automatically generated by [github_changelog_generator](https://github.com/github-changelog-generator/github-changelog-generator)*
