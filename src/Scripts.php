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
 * Scripts
 */
class Scripts extends Database
{
    /**
     * Get all scripts keyed by the alpha4 field.
     *
     * @return \JeremyWorboys\PhpCountries\Script[]
     */
    public static function findAllByAlpha4()
    {
        return static::sharedInstance()->findAllBy('alpha4');
    }

    /**
     * Get a script by its alpha4 field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Script
     */
    public static function findByAlpha4($value)
    {
        return static::sharedInstance()->findBy('alpha4', $value);
    }

    /**
     * Get all scripts keyed by the numeric field.
     *
     * @return \JeremyWorboys\PhpCountries\Script[]
     */
    public static function findAllByNumeric()
    {
        return static::sharedInstance()->findAllBy('numeric');
    }

    /**
     * Get a script by its numeric field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Script
     */
    public static function findByNumeric($value)
    {
        return static::sharedInstance()->findBy('numeric', $value);
    }

    /**
     * Get all scripts keyed by the name field.
     *
     * @return \JeremyWorboys\PhpCountries\Script[]
     */
    public static function findAllByName()
    {
        return static::sharedInstance()->findAllBy('name');
    }

    /**
     * Get a script by its name field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Script
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
        return __DIR__ . '/database/scripts.json';
    }

    /**
     * Create a collection entry instance.
     *
     * @param array $fields
     * @return \JeremyWorboys\PhpCountries\DatabaseEntry
     */
    protected function createChildInstance(array $fields)
    {
        return new Script($fields);
    }
}
