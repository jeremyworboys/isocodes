<?php
/**
 * PHP ISO Codes
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

namespace JeremyWorboys\IsoCodes;

/**
 * Subdivisions
 */
class Subdivisions extends Database
{
    /**
     * Get all subdivisions keyed by the code field.
     *
     * @return \JeremyWorboys\IsoCodes\Subdivision[]
     */
    public static function findAllByCode()
    {
        return static::sharedInstance()->findAllBy('code');
    }

    /**
     * Get a subdivision by its code field.
     *
     * @param string $value
     * @return \JeremyWorboys\IsoCodes\Subdivision
     */
    public static function findByCode($value)
    {
        return static::sharedInstance()->findBy('code', $value);
    }

    /**
     * Get all subdivisions keyed by the countryCode field.
     *
     * @return \JeremyWorboys\IsoCodes\Subdivision[][]
     */
    public static function findAllByCountryCode()
    {
        return static::sharedInstance()->findAllBy('countryCode');
    }

    /**
     * Get a subdivision by its countryCode field.
     *
     * @param string $value
     * @return \JeremyWorboys\IsoCodes\Subdivision[]
     */
    public static function findByCountryCode($value)
    {
        return static::sharedInstance()->findBy('countryCode', $value);
    }

    /**
     * Get the path to the data file for this collection.
     *
     * @return string
     */
    protected function getDataFilePath()
    {
        return __DIR__ . '/database/subdivisions.json';
    }

    /**
     * Create a collection entry instance.
     *
     * @param array $fields
     * @return \JeremyWorboys\IsoCodes\DatabaseEntry
     */
    protected function createChildInstance(array $fields)
    {
        return new Subdivision($fields);
    }
}
