<?php

namespace JeremyWorboys\PhpCountries;

class CountryTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function getAlpha2()
    {
        $country = $this->getCountry();

        $this->assertEquals('MD', $country->getAlpha2());
    }

    /** @test */
    public function getAlpha3()
    {
        $country = $this->getCountry();

        $this->assertEquals('MDA', $country->getAlpha3());
    }

    /** @test */
    public function getNumeric()
    {
        $country = $this->getCountry();

        $this->assertEquals('498', $country->getNumeric());
    }

    /** @test */
    public function getOfficialName()
    {
        $country = $this->getCountry();

        $this->assertEquals('Republic of Moldova', $country->getOfficialName());
    }

    /** @test */
    public function getCommonName()
    {
        $country = $this->getCountry();

        $this->assertEquals('Moldova', $country->getCommonName());
    }

    /** @test */
    public function testGetName()
    {
        $country = $this->getCountry();

        $this->assertEquals('Moldova, Republic of', $country->getName());
    }

    /**
     * @return \JeremyWorboys\PhpCountries\Country
     */
    protected function getCountry()
    {
        return new Country([
            'alpha2'       => 'MD',
            'alpha3'       => 'MDA',
            'numeric'      => '498',
            'officialName' => 'Republic of Moldova',
            'commonName'   => 'Moldova',
            'name'         => 'Moldova, Republic of',
        ]);
    }
}
