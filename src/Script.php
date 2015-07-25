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
 * Script
 */
class Script extends DatabaseEntry
{
    /** @var string */
    protected $alpha4;

    /** @var string */
    protected $numeric;

    /** @var string */
    protected $name;

    /**
     * @return string
     */
    public function getAlpha4()
    {
        return $this->alpha4;
    }

    /**
     * @return string
     */
    public function getNumeric()
    {
        return $this->numeric;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}
