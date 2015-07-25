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
    private static $__instanceCache = [];

    /**
     * Create a collection instance.
     */
    final private function __construct()
    {
        $data = self::getDataFromFile($this->getDataFilePath());

        $this->buildEntries($data['entries']);
        $this->buildIndices($data['indices']);
    }

    /**
     * Get a reference to the shared collection instance.
     *
     * @return static
     */
    final public static function sharedInstance()
    {
        $class = static::class;
        if (!isset(self::$__instanceCache[$class])) {
            self::$__instanceCache[$class] = new $class;
        }

        return self::$__instanceCache[$class];
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
     * Get all entries in collection.
     *
     * @return array
     */
    public function findAll()
    {
        return iterator_to_array($this);
    }

    /**
     * Get all entries keyed by an index.
     *
     * @param string $index
     * @return mixed
     */
    public function findAllBy($index)
    {
        if (!is_string($index)) {
            throw new \InvalidArgumentException('Index name must be a string.');
        }

        if (!array_key_exists($index, $this->indices)) {
            throw new \InvalidArgumentException(sprintf('There is no index named "%s".', $index));
        }

        return $this->indices[$index];
    }

    /**
     * Get an entry by an index.
     *
     * @param string $index
     * @param string $value
     * @return mixed
     */
    public function findBy($index, $value)
    {
        if (!is_string($index)) {
            throw new \InvalidArgumentException('Index name must be a string.');
        }

        if (!array_key_exists($index, $this->indices)) {
            throw new \InvalidArgumentException(sprintf('There is no index named "%s".', $index));
        }

        if (!array_key_exists($value, $this->indices[$index])) {
            throw new \InvalidArgumentException(sprintf('There is no value "%s" in the index "".', $value, $index));
        }

        return $this->indices[$index][$value];
    }

    /**
     * Get the path to the data file for this collection.
     *
     * @return string
     */
    abstract protected function getDataFilePath();

    /**
     * Create a collection entry instance.
     *
     * @param array $fields
     * @return \JeremyWorboys\IsoCodes\DatabaseEntry
     */
    abstract protected function createChildInstance(array $fields);

    /**
     * Get the data from the filesystem.
     *
     * @param string $filename
     * @return array
     */
    private static function getDataFromFile($filename)
    {
        $contents = file_get_contents($filename);

        return json_decode($contents, true);
    }

    /**
     * Build the array of entries.
     *
     * @param array $entries
     */
    private function buildEntries(array $entries)
    {
        $this->entries = [];

        foreach ($entries as $fields) {
            $this->entries[] = $this->createChildInstance($fields);
        }
    }

    /**
     * Build the array of indices.
     *
     * @param array $indices
     */
    private function buildIndices(array $indices)
    {
        $this->indices = [];

        foreach ($indices as $index => $entries) {
            $this->indices[$index] = [];
            foreach ($entries as $value => $positions) {
                if (is_array($positions)) {
                    $this->indices[$index][$value] = [];
                    foreach ($positions as $position) {
                        $this->indices[$index][$value][] = $this->entries[$position];
                    }
                } else {
                    $this->indices[$index][$value] = $this->entries[$positions];
                }
            }
        }
    }
}
