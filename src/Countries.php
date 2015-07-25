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
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Country|\JeremyWorboys\PhpCountries\Country[]
     */
    public function findByAlpha2($value = null)
    {
        return $this->findBy('alpha2', $value);
    }

    /**
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Country|\JeremyWorboys\PhpCountries\Country[]
     */
    public function findByAlpha3($value = null)
    {
        return $this->findBy('alpha3', $value);
    }

    /**
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Country|\JeremyWorboys\PhpCountries\Country[]
     */
    public function findByNumeric($value = null)
    {
        return $this->findBy('numeric', $value);
    }

    /**
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Country|\JeremyWorboys\PhpCountries\Country[]
     */
    public function findByOfficialName($value = null)
    {
        return $this->findBy('officialName', $value);
    }

    /**
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Country|\JeremyWorboys\PhpCountries\Country[]
     */
    public function findByCommonName($value = null)
    {
        return $this->findBy('commonName', $value);
    }

    /**
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Country|\JeremyWorboys\PhpCountries\Country[]
     */
    public function findByName($value = null)
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
