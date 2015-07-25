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
    public function findAllBy()
    {
        $countries = Countries::getSharedInstance();

        $results = $countries->findAllBy('alpha2');

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('AU', $results);
        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $results['AU']);
    }

    /** @test */
    public function findAllByWithMissingIndex()
    {
        $this->setExpectedException('InvalidArgumentException');

        Countries::getSharedInstance()->findAllBy('invalid');
    }

    /** @test */
    public function findAllByWithInvalidIndex()
    {
        $this->setExpectedException('InvalidArgumentException');

        Countries::getSharedInstance()->findAllBy(['index']);
    }

    /** @test */
    public function findBy()
    {
        $countries = Countries::getSharedInstance();

        $result = $countries->findBy('alpha2', 'AU');

        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $result);
        $this->assertEquals('Australia', $result->getName());
    }

    /** @test */
    public function findByWithMissingIndex()
    {
        $this->setExpectedException('InvalidArgumentException');

        Countries::getSharedInstance()->findBy('invalid', '');
    }

    /** @test */
    public function findByWithInvalidIndex()
    {
        $this->setExpectedException('InvalidArgumentException');

        Countries::getSharedInstance()->findBy(['index'], '');
    }

    /** @test */
    public function findByWithMissingValue()
    {
        $this->setExpectedException('InvalidArgumentException');

        Countries::getSharedInstance()->findBy('alpha2', 'ZZZ');
    }

    /** @test */
    public function findAllByAlpha2()
    {
        $countries = Countries::getSharedInstance();

        $results = $countries->findAllByAlpha2();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('AU', $results);
        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $results['AU']);
    }

    /** @test */
    public function findAllByAlpha3()
    {
        $countries = Countries::getSharedInstance();

        $results = $countries->findAllByAlpha3();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('USA', $results);
        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $results['USA']);
    }

    /** @test */
    public function findAllByNumeric()
    {
        $countries = Countries::getSharedInstance();

        $results = $countries->findAllByNumeric();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('076', $results);
        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $results['076']);
    }

    /** @test */
    public function findAllByOfficialName()
    {
        $countries = Countries::getSharedInstance();

        $results = $countries->findAllByOfficialName();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('Federal Republic of Germany', $results);
        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $results['Federal Republic of Germany']);
    }

    /** @test */
    public function findAllByCommonName()
    {
        $countries = Countries::getSharedInstance();

        $results = $countries->findAllByCommonName();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('Bolivia', $results);
        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $results['Bolivia']);
    }

    /** @test */
    public function findAllByName()
    {
        $countries = Countries::getSharedInstance();

        $results = $countries->findAllByName();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('Denmark', $results);
        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $results['Denmark']);
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
    public function findByAlpha3WithValue()
    {
        $countries = Countries::getSharedInstance();

        $result = $countries->findByAlpha3('USA');

        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $result);
        $this->assertEquals('United States', $result->getName());
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
    public function findByOfficialNameWithValue()
    {
        $countries = Countries::getSharedInstance();

        $result = $countries->findByOfficialName('Federal Republic of Germany');

        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $result);
        $this->assertEquals('Germany', $result->getName());
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
    public function findByNameWithValue()
    {
        $countries = Countries::getSharedInstance();

        $result = $countries->findByName('Denmark');

        $this->assertInstanceOf('JeremyWorboys\PhpCountries\Country', $result);
        $this->assertEquals('Kingdom of Denmark', $result->getOfficialName());
    }
}
