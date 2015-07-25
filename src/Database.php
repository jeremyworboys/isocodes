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
 * Database
 *
 * This is the base class for all data sets. It handles loading the data from
 * the filesystem and implements some common tasks.
 */
abstract class Database implements \IteratorAggregate, \Countable
{
    /** @var array */
    protected $entries;

    /** @var array */
    protected $indices;

    /** @var array */
    private static $__fileCache = [];

    /**
     * @param string $filename
     */
    public function __construct($filename)
    {
        $dataset = self::getDataset($filename);

        $this->entries = $dataset['entries'];
        $this->indices = $dataset['indices'];
    }

    /**
     * Retrieve an external iterator.
     *
     * @return \Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->entries);
    }

    /**
     * Count elements of an object.
     *
     * @return int
     */
    public function count()
    {
        return count($this->entries);
    }

    /**
     * Get the data from the filesystem or cache.
     *
     * @param string $filename
     */
    private static function getDataset($filename)
    {
        if (!isset(self::$__fileCache[$filename])) {
            $contents = file_get_contents($filename);
            self::$__fileCache[$filename] = json_decode($contents, true);
        }

        return self::$__fileCache[$filename];
    }
}
