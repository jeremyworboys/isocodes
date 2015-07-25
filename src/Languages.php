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
 * Languages
 */
class Languages extends Database
{
    /**
     * Get all languages keyed by the iso6393Code field.
     *
     * @return \JeremyWorboys\PhpCountries\Language[]
     */
    public static function findAllByIso6393Code()
    {
        return static::sharedInstance()->findAllBy('iso6393Code');
    }

    /**
     * Get a language by its iso6393Code field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Language
     */
    public static function findByIso6393Code($value)
    {
        return static::sharedInstance()->findBy('iso6393Code', $value);
    }

    /**
     * Get all languages keyed by the iso6391Code field.
     *
     * @return \JeremyWorboys\PhpCountries\Language[]
     */
    public static function findAllByIso6391Code()
    {
        return static::sharedInstance()->findAllBy('iso6391Code');
    }

    /**
     * Get a language by its iso6391Code field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Language
     */
    public static function findByIso6391Code($value)
    {
        return static::sharedInstance()->findBy('iso6391Code', $value);
    }

    /**
     * Get all languages keyed by the iso6392TCode field.
     *
     * @return \JeremyWorboys\PhpCountries\Language[]
     */
    public static function findAllByIso6392TCode()
    {
        return static::sharedInstance()->findAllBy('iso6392TCode');
    }

    /**
     * Get a language by its iso6392TCode field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Language
     */
    public static function findByIso6392TCode($value)
    {
        return static::sharedInstance()->findBy('iso6392TCode', $value);
    }

    /**
     * Get all languages keyed by the name field.
     *
     * @return \JeremyWorboys\PhpCountries\Language[]
     */
    public static function findAllByName()
    {
        return static::sharedInstance()->findAllBy('name');
    }

    /**
     * Get a language by its name field.
     *
     * @param string $value
     * @return \JeremyWorboys\PhpCountries\Language
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
        return __DIR__ . '/database/languages.json';
    }

    /**
     * Create a collection entry instance.
     *
     * @param array $fields
     * @return \JeremyWorboys\PhpCountries\DatabaseEntry
     */
    protected function createChildInstance(array $fields)
    {
        return new Language($fields);
    }
}
