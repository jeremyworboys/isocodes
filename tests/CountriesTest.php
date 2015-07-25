<?php

namespace JeremyWorboys\PhpCountries;

class CountriesTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function itIsCountable()
    {
        $countries = new Countries();

        $this->assertInstanceOf('Countable', $countries);
    }

    /** @test */
    public function itIsTraversable()
    {
        $countries = new Countries();

        $this->assertInstanceOf('Traversable', $countries);
    }

    /** @test */
    public function itContainsTheRightAmountOfCountries()
    {
        $countries = new Countries();

        $this->assertCount(249, $countries);
    }

    /** @test */
    public function itContainsReturnsCountryInstancesWhenIterated()
    {
        $countries = new Countries();

        $this->assertContainsOnlyInstancesOf('JeremyWorboys\PhpCountries\Country', iterator_to_array($countries));
    }
}