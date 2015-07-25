<?php

namespace JeremyWorboys\IsoCodes;

class CountriesTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function itIsCountable()
    {
        $countries = Countries::sharedInstance();

        $this->assertInstanceOf('Countable', $countries);
    }

    /** @test */
    public function itIsTraversable()
    {
        $countries = Countries::sharedInstance();

        $this->assertInstanceOf('Traversable', $countries);
    }

    /** @test */
    public function itIsASingleton()
    {
        $countries1 = Countries::sharedInstance();
        $countries2 = Countries::sharedInstance();

        $this->assertSame($countries1, $countries2);
    }

    /** @test */
    public function itContainsTheRightAmountOfCountries()
    {
        $countries = Countries::sharedInstance();

        $this->assertCount(249, $countries);
    }

    /** @test */
    public function itContainsOnlyCountryInstancesWhenIterated()
    {
        $countries = Countries::sharedInstance();

        $this->assertContainsOnlyInstancesOf('JeremyWorboys\IsoCodes\Country', iterator_to_array($countries));
    }

    /** @test */
    public function findAll()
    {
        $countries = Countries::sharedInstance();

        $results = $countries->findAll();

        $this->assertInternalType('array', $results);
        $this->assertContainsOnlyInstancesOf('JeremyWorboys\IsoCodes\Country', $results);
    }

    /** @test */
    public function findAllBy()
    {
        $countries = Countries::sharedInstance();

        $results = $countries->findAllBy('alpha2');

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('AU', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $results['AU']);
    }

    /** @test */
    public function findAllByWithMissingIndex()
    {
        $this->setExpectedException('InvalidArgumentException');

        Countries::sharedInstance()->findAllBy('invalid');
    }

    /** @test */
    public function findAllByWithInvalidIndex()
    {
        $this->setExpectedException('InvalidArgumentException');

        Countries::sharedInstance()->findAllBy(['index']);
    }

    /** @test */
    public function findBy()
    {
        $countries = Countries::sharedInstance();

        $result = $countries->findBy('alpha2', 'AU');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $result);
        $this->assertEquals('Australia', $result->getName());
    }

    /** @test */
    public function findByWithMissingIndex()
    {
        $this->setExpectedException('InvalidArgumentException');

        Countries::sharedInstance()->findBy('invalid', '');
    }

    /** @test */
    public function findByWithInvalidIndex()
    {
        $this->setExpectedException('InvalidArgumentException');

        Countries::sharedInstance()->findBy(['index'], '');
    }

    /** @test */
    public function findByWithMissingValue()
    {
        $this->setExpectedException('InvalidArgumentException');

        Countries::sharedInstance()->findBy('alpha2', 'ZZZ');
    }

    /** @test */
    public function findAllByAlpha2()
    {
        $results = Countries::findAllByAlpha2();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('AU', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $results['AU']);
    }

    /** @test */
    public function findAllByAlpha3()
    {
        $results = Countries::findAllByAlpha3();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('USA', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $results['USA']);
    }

    /** @test */
    public function findAllByNumeric()
    {
        $results = Countries::findAllByNumeric();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('076', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $results['076']);
    }

    /** @test */
    public function findAllByOfficialName()
    {
        $results = Countries::findAllByOfficialName();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('Federal Republic of Germany', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $results['Federal Republic of Germany']);
    }

    /** @test */
    public function findAllByCommonName()
    {
        $results = Countries::findAllByCommonName();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('Bolivia', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $results['Bolivia']);
    }

    /** @test */
    public function findAllByName()
    {
        $results = Countries::findAllByName();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('Denmark', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $results['Denmark']);
    }

    /** @test */
    public function findByAlpha2WithValue()
    {
        $result = Countries::findByAlpha2('AU');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $result);
        $this->assertEquals('Australia', $result->getName());
    }

    /** @test */
    public function findByAlpha3WithValue()
    {
        $result = Countries::findByAlpha3('USA');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $result);
        $this->assertEquals('United States', $result->getName());
    }

    /** @test */
    public function findByNumericWithValue()
    {
        $result = Countries::findByNumeric('076');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $result);
        $this->assertEquals('Brazil', $result->getName());
    }

    /** @test */
    public function findByOfficialNameWithValue()
    {
        $result = Countries::findByOfficialName('Federal Republic of Germany');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $result);
        $this->assertEquals('Germany', $result->getName());
    }

    /** @test */
    public function findByCommonNameWithValue()
    {
        $result = Countries::findByCommonName('Bolivia');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $result);
        $this->assertEquals('Bolivia, Plurinational State of', $result->getName());
    }

    /** @test */
    public function findByNameWithValue()
    {
        $result = Countries::findByName('Denmark');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $result);
        $this->assertEquals('Kingdom of Denmark', $result->getOfficialName());
    }
}
