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
 * ISO Codes facade
 */
final class IsoCodes
{
    /**
     * Get a reference to the ISO-3166 (Countries) singleton.
     *
     * @return \JeremyWorboys\IsoCodes\Countries
     */
    public static function countries()
    {
        return Countries::sharedInstance();
    }

    /**
     * Get a reference to the ISO-639-3 (Languages) database singleton.
     *
     * @return \JeremyWorboys\IsoCodes\Languages
     */
    public static function languages()
    {
        return Languages::sharedInstance();
    }

    /**
     * Get a reference to the ISO-4217 (Currencies) database singleton.
     *
     * @return \JeremyWorboys\IsoCodes\Currencies
     */
    public static function currencies()
    {
        return Currencies::sharedInstance();
    }

    /**
     * Get a reference to the ISO-15924 (Scripts) database singleton.
     *
     * @return \JeremyWorboys\IsoCodes\Scripts
     */
    public static function scripts()
    {
        return Scripts::sharedInstance();
    }

    /**
     * Get a reference to the ISO-3166-2 (Subdivisions) database singleton.
     *
     * @return \JeremyWorboys\IsoCodes\Subdivisions
     */
    public static function subdivisions()
    {
        return Subdivisions::sharedInstance();
    }
}
