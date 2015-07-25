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
 * Scripts
 */
class Scripts extends Database
{
    /**
     * Get all scripts keyed by the alpha4 field.
     *
     * @return \JeremyWorboys\IsoCodes\Script[]
     */
    public function findAllByAlpha4()
    {
        return $this->findAllBy('alpha4');
    }

    /**
     * Get a script by its alpha4 field.
     *
     * @param string $value
     * @return \JeremyWorboys\IsoCodes\Script
     */
    public function findByAlpha4($value)
    {
        return $this->findBy('alpha4', $value);
    }

    /**
     * Get all scripts keyed by the numeric field.
     *
     * @return \JeremyWorboys\IsoCodes\Script[]
     */
    public function findAllByNumeric()
    {
        return $this->findAllBy('numeric');
    }

    /**
     * Get a script by its numeric field.
     *
     * @param string $value
     * @return \JeremyWorboys\IsoCodes\Script
     */
    public function findByNumeric($value)
    {
        return $this->findBy('numeric', $value);
    }

    /**
     * Get all scripts keyed by the name field.
     *
     * @return \JeremyWorboys\IsoCodes\Script[]
     */
    public function findAllByName()
    {
        return $this->findAllBy('name');
    }

    /**
     * Get a script by its name field.
     *
     * @param string $value
     * @return \JeremyWorboys\IsoCodes\Script
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
        return __DIR__ . '/database/scripts.json';
    }

    /**
     * Create a collection entry instance.
     *
     * @param array $fields
     * @return \JeremyWorboys\IsoCodes\DatabaseEntry
     */
    protected function createChildInstance(array $fields)
    {
        return new Script($fields);
    }
}
