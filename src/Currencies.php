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
 * Currencies
 */
class Currencies extends Database
{
    /**
     * Get all currencies keyed by the letter field.
     *
     * @return \JeremyWorboys\PhpCountries\Currency[]
     */
    public static function findAllByLetter()
    {
        return static::sharedInstance()->findAllBy('letter');
    }

    /**
     * Get a currency by its letter field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Currency
     */
    public static function findByLetter($value)
    {
        return static::sharedInstance()->findBy('letter', $value);
    }

    /**
     * Get all currencies keyed by the numeric field.
     *
     * @return \JeremyWorboys\PhpCountries\Currency[]
     */
    public static function findAllByNumeric()
    {
        return static::sharedInstance()->findAllBy('numeric');
    }

    /**
     * Get a currency by its numeric field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Currency
     */
    public static function findByNumeric($value)
    {
        return static::sharedInstance()->findBy('numeric', $value);
    }

    /**
     * Get all currencies keyed by the name field.
     *
     * @return \JeremyWorboys\PhpCountries\Currency[]
     */
    public static function findAllByName()
    {
        return static::sharedInstance()->findAllBy('name');
    }

    /**
     * Get a currency by its name field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Currency
     */
    public static function findByName($value)
    {
        return static::sharedInstance()->findBy('name', $value);
    }

    /**
     * Get the path to the data file for this collection.
     *
     * @return string
     */
    protected function getDataFilePath()
    {
        return __DIR__ . '/database/currencies.json';
    }

    /**
     * Create a collection entry instance.
     *
     * @param array $fields
     * @return \JeremyWorboys\PhpCountries\Currency
     */
    protected function createChildInstance(array $fields)
    {
        return new Currency($fields);
    }
}
