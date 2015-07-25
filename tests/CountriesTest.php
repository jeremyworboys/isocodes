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

    /** @test */
    public function findByAlpha2WithNullValue()
    {
        $countries = Countries::getSharedInstance();

        $results = $countries->findByAlpha2();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('AU', $results);
        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $results['AU']);
    }

    /** @test */
    public function findByAlpha2WithValue()
    {
        $countries = Countries::getSharedInstance();

        $result = $countries->findByAlpha2('AU');

        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $result);
        $this->assertEquals('Australia', $result->getName());
    }

    /** @test */
    public function findByAlpha3WithNullValue()
    {
        $countries = Countries::getSharedInstance();

        $results = $countries->findByAlpha3();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('USA', $results);
        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $results['USA']);
    }

    /** @test */
    public function findByAlpha3WithValue()
    {
        $countries = Countries::getSharedInstance();

        $result = $countries->findByAlpha3('USA');

        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $result);
        $this->assertEquals('United States', $result->getName());
    }

    /** @test */
    public function findByNumericWithNullValue()
    {
        $countries = Countries::getSharedInstance();

        $results = $countries->findByNumeric();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('076', $results);
        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $results['076']);
    }

    /** @test */
    public function findByNumericWithValue()
    {
        $countries = Countries::getSharedInstance();

        $result = $countries->findByNumeric('076');

        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $result);
        $this->assertEquals('Brazil', $result->getName());
    }

    /** @test */
    public function findByOfficialNameWithNullValue()
    {
        $countries = Countries::getSharedInstance();

        $results = $countries->findByOfficialName();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('Federal Republic of Germany', $results);
        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $results['Federal Republic of Germany']);
    }

    /** @test */
    public function findByOfficialNameWithValue()
    {
        $countries = Countries::getSharedInstance();

        $result = $countries->findByOfficialName('Federal Republic of Germany');

        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $result);
        $this->assertEquals('Germany', $result->getName());
    }

    /** @test */
    public function findByCommonNameWithNullValue()
    {
        $countries = Countries::getSharedInstance();

        $results = $countries->findByCommonName();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('Bolivia', $results);
        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $results['Bolivia']);
    }

    /** @test */
    public function findByCommonNameWithValue()
    {
        $countries = Countries::getSharedInstance();

        $result = $countries->findByCommonName('Bolivia');

        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $result);
        $this->assertEquals('Bolivia, Plurinational State of', $result->getName());
    }

    /** @test */
    public function findByNameWithNullValue()
    {
        $countries = Countries::getSharedInstance();

        $results = $countries->findByName();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('Denmark', $results);
        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $results['Denmark']);
    }

    /** @test */
    public function findByNameWithValue()
    {
        $countries = Countries::getSharedInstance();

        $result = $countries->findByName('Denmark');

        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $result);
        $this->assertEquals('Kingdom of Denmark', $result->getOfficialName());
    }
}
