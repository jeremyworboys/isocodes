<?php
/**
 * PHP Countries
 * Copyright (C) 2015 Jeremy Worboys <jw@jeremyworboys.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301
 * USA
 */

namespace JeremyWorboys\PhpCountries;

/**
 * Countries
 */
class Countries extends Database
{
    /**
     * Get all countries keyed by the alpha2 field.
     *
     * @return \JeremyWorboys\PhpCountries\Country[]
     */
    public static function findAllByAlpha2()
    {
        return static::getSharedInstance()->findAllBy('alpha2');
    }

    /**
     * Get a country by its alpha2 field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Country
     */
    public static function findByAlpha2($value)
    {
        return static::getSharedInstance()->findBy('alpha2', $value);
    }

    /**
     * Get all countries keyed by the alpha3 field.
     *
     * @return \JeremyWorboys\PhpCountries\Country[]
     */
    public static function findAllByAlpha3()
    {
        return static::getSharedInstance()->findAllBy('alpha3');
    }

    /**
     * Get a country by its alpha3 field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Country
     */
    public static function findByAlpha3($value)
    {
        return static::getSharedInstance()->findBy('alpha3', $value);
    }

    /**
     * Get all countries keyed by the numeric field.
     *
     * @return \JeremyWorboys\PhpCountries\Country[]
     */
    public static function findAllByNumeric()
    {
        return static::getSharedInstance()->findAllBy('numeric');
    }

    /**
     * Get a country by its numeric field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Country
     */
    public static function findByNumeric($value)
    {
        return static::getSharedInstance()->findBy('numeric', $value);
    }

    /**
     * Get all countries keyed by the officialName field.
     *
     * @return \JeremyWorboys\PhpCountries\Country[]
     */
    public static function findAllByOfficialName()
    {
        return static::getSharedInstance()->findAllBy('officialName');
    }

    /**
     * Get a country by its officialName field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Country
     */
    public static function findByOfficialName($value)
    {
        return static::getSharedInstance()->findBy('officialName', $value);
    }

    /**
     * Get all countries keyed by the commonName field.
     *
     * @return \JeremyWorboys\PhpCountries\Country[]
     */
    public static function findAllByCommonName()
    {
        return static::getSharedInstance()->findAllBy('commonName');
    }

    /**
     * Get a country by its commonName field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Country
     */
    public static function findByCommonName($value)
    {
        return static::getSharedInstance()->findBy('commonName', $value);
    }

    /**
     * Get all countries keyed by the name field.
     *
     * @return \JeremyWorboys\PhpCountries\Country[]
     */
    public static function findAllByName()
    {
        return static::getSharedInstance()->findAllBy('name');
    }

    /**
     * Get a country by its name field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Country
     */
    public static function findByName($value)
    {
        return static::getSharedInstance()->findBy('name', $value);
    }

    /**
     * Get the path to the data file for this collection.
     *
     * @return string
     */
    protected function getDataFilePath()
    {
        return __DIR__ . '/database/countries.json';
    }

    /**
     * Create a collection entry instance.
     *
     * @param array $fields
     * @return \JeremyWorboys\PhpCountries\Country
     */
    protected function createChildInstance(array $fields)
    {
        return new Country($fields);
    }
}
