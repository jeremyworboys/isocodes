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
 * Currencies
 */
class Currencies extends Database
{
    /**
     * Get all currencies keyed by the letter field.
     *
     * @return \JeremyWorboys\IsoCodes\Currency[]
     */
    public function findAllByLetter()
    {
        return $this->findAllBy('letter');
    }

    /**
     * Get a currency by its letter field.
     *
     * @param string $value
     * @return \JeremyWorboys\IsoCodes\Currency
     */
    public function findByLetter($value)
    {
        return $this->findBy('letter', $value);
    }

    /**
     * Get all currencies keyed by the numeric field.
     *
     * @return \JeremyWorboys\IsoCodes\Currency[]
     */
    public function findAllByNumeric()
    {
        return $this->findAllBy('numeric');
    }

    /**
     * Get a currency by its numeric field.
     *
     * @param string $value
     * @return \JeremyWorboys\IsoCodes\Currency
     */
    public function findByNumeric($value)
    {
        return $this->findBy('numeric', $value);
    }

    /**
     * Get all currencies keyed by the name field.
     *
     * @return \JeremyWorboys\IsoCodes\Currency[]
     */
    public function findAllByName()
    {
        return $this->findAllBy('name');
    }

    /**
     * Get a currency by its name field.
     *
     * @param string $value
     * @return \JeremyWorboys\IsoCodes\Currency
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
        return __DIR__ . '/database/currencies.json';
    }

    /**
     * Create a collection entry instance.
     *
     * @param array $fields
     * @return \JeremyWorboys\IsoCodes\Currency
     */
    protected function createChildInstance(array $fields)
    {
        return new Currency($fields);
    }
}
