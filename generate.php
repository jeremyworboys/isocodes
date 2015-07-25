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

$isoCodesDir = __DIR__ . '/iso-codes';
$databaseDir = __DIR__ . '/src/database';

assert(is_dir($databaseDir), 'Data directory exists');
assert(is_dir($isoCodesDir), 'ISO-codes directory exists');

$databases = [
    'countries'    => [
        'source'      => $isoCodesDir . '/iso_3166/iso_3166.xml',
        'destination' => $databaseDir . '/countries.json',
        'entry_tags'  => ['iso_3166_entry'],
        'data_mapper' => 'mapEntryFields',
        'field_map'   => [
            'alpha2'       => 'alpha_2_code',
            'alpha3'       => 'alpha_3_code',
            'numeric'      => 'numeric_code',
            'officialName' => 'official_name',
            'commonName'   => 'common_name',
            'name'         => 'name',
        ],
        'index'       => ['alpha2', 'alpha3', 'numeric', 'officialName', 'commonName', 'name'],
    ],
    'scripts'      => [
        'source'      => $isoCodesDir . '/iso_15924/iso_15924.xml',
        'destination' => $databaseDir . '/scripts.json',
        'entry_tags'  => ['iso_15924_entry'],
        'data_mapper' => 'mapEntryFields',
        'field_map'   => [
            'alpha4'  => 'alpha_4_code',
            'numeric' => 'numeric_code',
            'name'    => 'name',
        ],
        'index'       => ['alpha4', 'numeric', 'name'],
    ],
    'currencies'   => [
        'source'      => $isoCodesDir . '/iso_4217/iso_4217.xml',
        'destination' => $databaseDir . '/currencies.json',
        'entry_tags'  => ['iso_4217_entry'],
        'data_mapper' => 'mapEntryFields',
        'field_map'   => [
            'letter'  => 'letter_code',
            'numeric' => 'numeric_code',
            'name'    => 'currency_name',
        ],
        'index'       => ['letter', 'numeric', 'name'],
    ],
    'languages'    => [
        'source'      => $isoCodesDir . '/iso_639_3/iso_639_3.xml',
        'destination' => $databaseDir . '/languages.json',
        'entry_tags'  => ['iso_639_3_entry'],
        'data_mapper' => 'mapEntryFields',
        'field_map'   => [
            'iso6393Code'   => 'id',
            'iso6391Code'   => 'part1_code',
            'iso6392TCode'  => 'part2_code',
            'status'        => 'status',
            'scope'         => 'scope',
            'type'          => 'type',
            'invertedName'  => 'inverted_name',
            'referenceName' => 'reference_name',
            'name'          => 'name',
            'commonName'    => 'common_name',
        ],
        'index'       => ['iso6393Code', 'iso6391Code', 'iso6392TCode', 'name'],
    ],
    'subdivisions' => [
        'source'      => $isoCodesDir . '/iso_3166_2/iso_3166_2.xml',
        'destination' => $databaseDir . '/subdivisions.json',
        'entry_tags'  => ['iso_3166_2_entry'],
        'data_mapper' => 'mapSubdivisionFields',
        'field_map'   => [
            'code'       => 'code',
            'name'       => 'name',
            'parentCode' => 'parent',
        ],
        'index'       => ['code', 'countryCode'],
    ],
];

/*
 * Loop through each mapping to generate the databases.
 */
foreach ($databases as $dataType => $mapping) {
    $isoData = simplexml_load_file($mapping['source']);
    $located = locateElements($isoData, $mapping['entry_tags']);
    $entries = generateEntries($located, $mapping['data_mapper'], $mapping['field_map']);
    $indices = generateIndices($dataType, $entries, $mapping['index']);

    file_put_contents($mapping['destination'], json_encode(compact('entries', 'indices')));
}

/**
 * Find all entry elements in the data set.
 *
 * @param \SimpleXMLElement $isoData
 * @param array             $entryTags
 * @return array
 */
function locateElements(SimpleXMLElement $isoData, array $entryTags)
{
    $entries = [];
    foreach ($entryTags as $tag) {
        $entries = array_merge($entries, $isoData->xpath('//' . $tag));
    }
    return $entries;
}

/**
 * Generate entries from ISO elements.
 *
 * @param array           $isoCodeElements
 * @param string|callable $dataMapper
 * @param array           $fieldMap
 * @return array
 */
function generateEntries(array $isoCodeElements, callable $dataMapper, array $fieldMap)
{
    $entries = [];
    foreach ($isoCodeElements as $isoCodeElement) {
        $elementFields = getElementFields($isoCodeElement, $fieldMap);
        $entries[] = $dataMapper($isoCodeElement, $elementFields);
    }
    return $entries;
}

/**
 * Map the fields from the ISO element to an array.
 *
 * @param \SimpleXMLElement $isoCodeElement
 * @param array             $fieldMap
 * @return array
 */
function getElementFields(SimpleXMLElement $isoCodeElement, array $fieldMap)
{
    $entry = [];
    foreach ($fieldMap as $fieldName => $isoFieldName) {
        $entry[$fieldName] = (string) $isoCodeElement[$isoFieldName];
    }
    return $entry;
}

/**
 * Map the fields from an element to an entry.
 *
 * @param \SimpleXMLElement $isoCodeElement
 * @param array             $mappedFields
 * @return array
 */
function mapEntryFields(SimpleXMLElement $isoCodeElement, array $mappedFields)
{
    return $mappedFields;
}

/**
 * Map the fields from an element to a subdivision entry.
 *
 * @param \SimpleXMLElement $isoCodeElement
 * @param array             $mappedFields
 * @return array
 */
function mapSubdivisionFields(SimpleXMLElement $isoCodeElement, array $mappedFields)
{
    $isoCodeElementParent = current($isoCodeElement->xpath('..'));

    $mappedFields['type'] = (string) $isoCodeElementParent['type'];
    $mappedFields['countryCode'] = explode('-', $mappedFields['code'])[0];

    if (!empty($mappedFields['parentCode'])) {
        $mappedFields['parentCode'] = sprintf('%s-%s', $mappedFields['countryCode'], $mappedFields['parentCode']);
    }

    return $mappedFields;
}

/**
 * Generate indices for the data set.
 *
 * @param string $dataType
 * @param array  $entries
 * @param array  $indexes
 * @return array
 */
function generateIndices($dataType, array $entries, array $indexes)
{
    $indices = [];
    foreach ($entries as $position => $entry) {
        foreach ($indexes as $index) {
            $value = $entry[$index];
            if (empty($value)) {
                continue;
            }
            if (!array_key_exists($index, $indices)) {
                $indices[$index] = [];
            }
            if (in_array($value, $indices[$index], true)) {
                indexCollision($dataType, $value, $index);
            }
            $indices[$index][$value] = $position;
        }
    }
    return $indices;
}

/**
 * Notify of an index collision.
 *
 * @param string $dataType
 * @param string $value
 * @param string $index
 * @return string
 */
function indexCollision($dataType, $value, $index)
{
    $message = '"%s" "%s" already taken in index "%s" and will be ignored. This is an error in the XML databases.';
    assert(false, sprintf($message, $dataType, $value, $index));
}
