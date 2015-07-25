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
 * Languages
 */
class Languages extends Database
{
    /**
     * Get all languages keyed by the iso6393Code field.
     *
     * @return \JeremyWorboys\IsoCodes\Language[]
     */
    public function findAllByIso6393Code()
    {
        return $this->findAllBy('iso6393Code');
    }

    /**
     * Get a language by its iso6393Code field.
     *
     * @param string $value
     * @return \JeremyWorboys\IsoCodes\Language
     */
    public function findByIso6393Code($value)
    {
        return $this->findBy('iso6393Code', $value);
    }

    /**
     * Get all languages keyed by the iso6391Code field.
     *
     * @return \JeremyWorboys\IsoCodes\Language[]
     */
    public function findAllByIso6391Code()
    {
        return $this->findAllBy('iso6391Code');
    }

    /**
     * Get a language by its iso6391Code field.
     *
     * @param string $value
     * @return \JeremyWorboys\IsoCodes\Language
     */
    public function findByIso6391Code($value)
    {
        return $this->findBy('iso6391Code', $value);
    }

    /**
     * Get all languages keyed by the iso6392TCode field.
     *
     * @return \JeremyWorboys\IsoCodes\Language[]
     */
    public function findAllByIso6392TCode()
    {
        return $this->findAllBy('iso6392TCode');
    }

    /**
     * Get a language by its iso6392TCode field.
     *
     * @param string $value
     * @return \JeremyWorboys\IsoCodes\Language
     */
    public function findByIso6392TCode($value)
    {
        return $this->findBy('iso6392TCode', $value);
    }

    /**
     * Get all languages keyed by the name field.
     *
     * @return \JeremyWorboys\IsoCodes\Language[]
     */
    public function findAllByName()
    {
        return $this->findAllBy('name');
    }

    /**
     * Get a language by its name field.
     *
     * @param string $value
     * @return \JeremyWorboys\IsoCodes\Language
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
        return __DIR__ . '/database/languages.json';
    }

    /**
     * Create a collection entry instance.
     *
     * @param array $fields
     * @return \JeremyWorboys\IsoCodes\DatabaseEntry
     */
    protected function createChildInstance(array $fields)
    {
        return new Language($fields);
    }
}
