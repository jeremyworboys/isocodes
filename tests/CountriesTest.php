<?php

namespace JeremyWorboys\PhpCountries;

class CountriesTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function itIsCountable()
    {
        $countries = Countries::getSharedInstance();

        $this->assertInstanceOf('Countable', $countries);
    }

    /** @test */
    public function itIsTraversable()
    {
        $countries = Countries::getSharedInstance();

        $this->assertInstanceOf('Traversable', $countries);
    }

    /** @test */
    public function itIsASingleton()
    {
        $countries1 = Countries::getSharedInstance();
        $countries2 = Countries::getSharedInstance();

        $this->assertSame($countries1, $countries2);
    }

    /** @test */
    public function itContainsTheRightAmountOfCountries()
    {
        $countries = Countries::getSharedInstance();

        $this->assertCount(249, $countries);
    }

    /** @test */
    public function itContainsReturnsCountryInstancesWhenIterated()
    {
        $countries = Countries::getSharedInstance();

        $this->assertContainsOnlyInstancesOf('JeremyWorboys\PhpCountries\Country', iterator_to_array($countries));
    }

    /** @test */
    public function findAll()
    {
        $countries = Countries::getSharedInstance();

        $results = $countries->findAll();

        $this->assertInternalType('array', $results);
        $this->assertContainsOnlyInstancesOf('JeremyWorboys\PhpCountries\Country', $results);
    }

    /** @test */
    public function findByWithNullValue()
    {
        $countries = Countries::getSharedInstance();

        $results = $countries->findBy('alpha2');

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('AU', $results);
        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $results['AU']);
    }

    /** @test */
    public function findByWithValue()
    {
        $countries = Countries::getSharedInstance();

        $result = $countries->findBy('alpha2', 'AU');

        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $result);
        $this->assertEquals('Australia', $result->getName());
    }

    /** @test */
    public function findByWithMissingValue()
    {
        $countries = Countries::getSharedInstance();

        $result = $countries->findBy('alpha2', 'ZZZ');

        $this->assertNull($result);
    }

    /** @test */
    public function findByWithInvalidIndex()
    {
        $this->setExpectedException('InvalidArgumentException');

        Countries::getSharedInstance()->findBy('invalid');
    }

    /** @test */
    public function findByWithInvalidIndexType()
    {
        $this->setExpectedException('InvalidArgumentException');

        Countries::getSharedInstance()->findBy(['index' => 'value']);
    }
}
