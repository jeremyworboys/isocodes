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
    public function findAllByAlpha2()
    {
        return $this->findAllBy('alpha2');
    }

    /**
     * Get a country by its alpha2 field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Country
     */
    public function findByAlpha2($value)
    {
        return $this->findBy('alpha2', $value);
    }

    /**
     * Get all countries keyed by the alpha3 field.
     *
     * @return \JeremyWorboys\PhpCountries\Country[]
     */
    public function findAllByAlpha3()
    {
        return $this->findAllBy('alpha3');
    }

    /**
     * Get a country by its alpha3 field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Country
     */
    public function findByAlpha3($value)
    {
        return $this->findBy('alpha3', $value);
    }

    /**
     * Get all countries keyed by the numeric field.
     *
     * @return \JeremyWorboys\PhpCountries\Country[]
     */
    public function findAllByNumeric()
    {
        return $this->findAllBy('numeric');
    }

    /**
     * Get a country by its numeric field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Country
     */
    public function findByNumeric($value)
    {
        return $this->findBy('numeric', $value);
    }

    /**
     * Get all countries keyed by the officialName field.
     *
     * @return \JeremyWorboys\PhpCountries\Country[]
     */
    public function findAllByOfficialName()
    {
        return $this->findAllBy('officialName');
    }

    /**
     * Get a country by its officialName field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Country
     */
    public function findByOfficialName($value)
    {
        return $this->findBy('officialName', $value);
    }

    /**
     * Get all countries keyed by the commonName field.
     *
     * @return \JeremyWorboys\PhpCountries\Country[]
     */
    public function findAllByCommonName()
    {
        return $this->findAllBy('commonName');
    }

    /**
     * Get a country by its commonName field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Country
     */
    public function findByCommonName($value)
    {
        return $this->findBy('commonName', $value);
    }

    /**
     * Get all countries keyed by the name field.
     *
     * @return \JeremyWorboys\PhpCountries\Country[]
     */
    public function findAllByName()
    {
        return $this->findAllBy('name');
    }

    /**
     * Get a country by its name field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Country
     */
    public function findByName($value)
    {
        return $this->findBy('name', $value);
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
