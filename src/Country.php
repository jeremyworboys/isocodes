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
 * Country
 */
class Country extends DatabaseEntry
{
    /** @var string */
    protected $alpha2;

    /** @var string */
    protected $alpha3;

    /** @var string */
    protected $numeric;

    /** @var string */
    protected $officialName;

    /** @var string */
    protected $commonName;

    /** @var string */
    protected $name;

    /**
     * @return string
     */
    public function getAlpha2()
    {
        return $this->alpha2;
    }

    /**
     * @return string
     */
    public function getAlpha3()
    {
        return $this->alpha3;
    }

    /**
     * @return string
     */
    public function getNumeric()
    {
        return $this->numeric;
    }

    /**
     * @return string
     */
    public function getOfficialName()
    {
        return $this->officialName;
    }

    /**
     * @return string
     */
    public function getCommonName()
    {
        return $this->commonName;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
