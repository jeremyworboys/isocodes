# PHP ISO Codes

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This package provides collections of various ISO standards (e.g. country, language, language scripts, and currency 
names) as PHP objects for use in your code. The data is generated from Debian's `pkg-isocodes`.

### [ISO 3166][link-iso-3166]

This lists the 2-letter country code and "short" country name. 

### [ISO 639-3][link-iso-639-3]

This is a further development of ISO 639-2. All codes of ISO 639-2 are included in ISO 639-3. ISO 639-3 attempts to 
provide as complete an enumeration of languages as possible, including living, extinct, ancient, and constructed 
languages, whether major or minor, written or unwritten. 

### [ISO 4217][link-iso-4217]

This lists the currency codes and names.

### [ISO 15924][link-iso-15924]

This lists the language scripts names.

### [ISO 3166-2][link-iso-3166-2]

The ISO 3166 standard includes a "Country Subdivision Code", giving a code for the names of the principal administrative
subdivisions of the countries coded in ISO 3166. 

## Data update policy

No changes to the data will be accepted. This is a pure wrapper around the ISO standard using the `pkg-isocodes` 
databases from Debian as is. If you find errors in the data you should file an issues on [Debian's Bug Tracker](https://alioth.debian.org/tracker/?atid=413077&group_id=30316).

## Install

Via Composer

``` bash
$ composer require jeremyworboys/isocodes
```

## Usage

All standards are available through database objects that are populated on first access. They are singletons to prevent 
loading the data from the filesystem on each request. Indices are pre-generated in the data files and rehydrated when
the database object is constructed. Each database object is `countable` and `traversable` as you will see in the 
following examples. 

### Countries (ISO 3166)

Countries are accessible through a database object and can be queried on various indices (alpha2, alpha3, numeric, 
officialName, commonName, name):

``` php
// Get the countries database singleton
$countries = JeremyWorboys\IsoCodes\IsoCodes::countries();

// Countries are countable
count($countries);  // 249

// Countries are traversable
foreach ($countries as $country) {
    echo $country->getName();
}

// Get an array of all countries
$allCountries = $countries->findAll();

// Get an array of all countries where the array key is the alpha2 code
$allCountries = $countries->findAllByAlpha2();

// Get an array of all countries where the array key is the country name
$allCountries = $countries->findAllByName();
```

Specific countries can be looked up by their various codes and provide the information included in the standard as 
getter methods:

``` php
// Get a single country by alpha2 code
$australia = $countries->findByAlpha2('AU');

$australia->getAlpha2();        // "AU"
$australia->getAlpha3();        // "AUS"
$australia->getNumeric();       // "036"
$australia->getOfficialName();  // ""
$australia->getCommonName();    // ""
$australia->getName();          // "Australia"
```

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Jeremy Worboys][link-author]
- [All Contributors][link-contributors]

## License

The LPGL 2.1 License (LPGL 2.1). Please see the [License File](LICENSE) for more information.

[ico-version]: https://img.shields.io/packagist/v/jeremyworboys/isocodes.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-LGPL--2.1-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/jeremyworboys/isocodes/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/jeremyworboys/isocodes.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/jeremyworboys/isocodes.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/jeremyworboys/isocodes.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/jeremyworboys/isocodes
[link-travis]: https://travis-ci.org/jeremyworboys/isocodes
[link-scrutinizer]: https://scrutinizer-ci.com/g/jeremyworboys/isocodes/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/jeremyworboys/isocodes
[link-downloads]: https://packagist.org/packages/jeremyworboys/isocodes
[link-author]: https://github.com/jeremyworboys
[link-contributors]: ../../contributors

[link-iso-3166]: http://www.iso.org/iso/country_codes
[link-iso-639]: http://www.loc.gov/standards/iso639-2/
[link-iso-639-3]: http://www.sil.org/iso639-3/
[link-iso-4217]: http://www.bsi-global.com/en/Standards-and-Publications/Industry-Sectors/Services/BSI-Currency-Code-Service/
[link-iso-15924]: http://unicode.org/iso15924/
[link-iso-3166-2]: http://www.iso.org/iso/country_codes/background_on_iso_3166/iso_3166-2.htm
