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
 * Language
 */
class Language extends DatabaseEntry
{
    /** @var string */
    protected $iso6393Code;

    /** @var string */
    protected $iso6391Code;

    /** @var string */
    protected $iso6392TCode;

    /** @var string */
    protected $status;

    /** @var string */
    protected $scope;

    /** @var string */
    protected $type;

    /** @var string */
    protected $invertedName;

    /** @var string */
    protected $referenceName;

    /** @var string */
    protected $name;

    /** @var string */
    protected $commonName;

    /**
     * @return string
     */
    public function getIso6393Code()
    {
        return $this->iso6393Code;
    }

    /**
     * @return string
     */
    public function getIso6391Code()
    {
        return $this->iso6391Code;
    }

    /**
     * @return string
     */
    public function getIso6392TCode()
    {
        return $this->iso6392TCode;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getInvertedName()
    {
        return $this->invertedName;
    }

    /**
     * @return string
     */
    public function getReferenceName()
    {
        return $this->referenceName;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCommonName()
    {
        return $this->commonName;
    }
}
