<?php

namespace JeremyWorboys\IsoCodes;

class CountriesTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function itIsCountable()
    {
        $countries = IsoCodes::countries();

        $this->assertInstanceOf('Countable', $countries);
    }

    /** @test */
    public function itIsTraversable()
    {
        $countries = IsoCodes::countries();

        $this->assertInstanceOf('Traversable', $countries);
    }

    /** @test */
    public function itIsASingleton()
    {
        $countries1 = IsoCodes::countries();
        $countries2 = IsoCodes::countries();

        $this->assertSame($countries1, $countries2);
    }

    /** @test */
    public function itContainsTheRightAmountOfCountries()
    {
        $countries = IsoCodes::countries();

        $this->assertCount(249, $countries);
    }

    /** @test */
    public function itContainsOnlyCountryInstancesWhenIterated()
    {
        $countries = IsoCodes::countries();

        $this->assertContainsOnlyInstancesOf('JeremyWorboys\IsoCodes\Country', iterator_to_array($countries));
    }

    /** @test */
    public function findAll()
    {
        $countries = IsoCodes::countries();

        $results = $countries->findAll();

        $this->assertInternalType('array', $results);
        $this->assertContainsOnlyInstancesOf('JeremyWorboys\IsoCodes\Country', $results);
    }

    /** @test */
    public function findAllBy()
    {
        $countries = IsoCodes::countries();

        $results = $countries->findAllBy('alpha2');

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('AU', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $results['AU']);
    }

    /** @test */
    public function findAllByWithMissingIndex()
    {
        $this->setExpectedException('InvalidArgumentException');

        IsoCodes::countries()->findAllBy('invalid');
    }

    /** @test */
    public function findAllByWithInvalidIndex()
    {
        $this->setExpectedException('InvalidArgumentException');

        IsoCodes::countries()->findAllBy(['index']);
    }

    /** @test */
    public function findBy()
    {
        $countries = IsoCodes::countries();

        $result = $countries->findBy('alpha2', 'AU');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $result);
        $this->assertEquals('Australia', $result->getName());
    }

    /** @test */
    public function findByWithMissingIndex()
    {
        $this->setExpectedException('InvalidArgumentException');

        IsoCodes::countries()->findBy('invalid', '');
    }

    /** @test */
    public function findByWithInvalidIndex()
    {
        $this->setExpectedException('InvalidArgumentException');

        IsoCodes::countries()->findBy(['index'], '');
    }

    /** @test */
    public function findByWithMissingValue()
    {
        $this->setExpectedException('InvalidArgumentException');

        IsoCodes::countries()->findBy('alpha2', 'ZZZ');
    }

    /** @test */
    public function findAllByAlpha2()
    {
        $results = IsoCodes::countries()->findAllByAlpha2();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('AU', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $results['AU']);
    }

    /** @test */
    public function findAllByAlpha3()
    {
        $results = IsoCodes::countries()->findAllByAlpha3();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('USA', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $results['USA']);
    }

    /** @test */
    public function findAllByNumeric()
    {
        $results = IsoCodes::countries()->findAllByNumeric();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('076', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $results['076']);
    }

    /** @test */
    public function findAllByOfficialName()
    {
        $results = IsoCodes::countries()->findAllByOfficialName();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('Federal Republic of Germany', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $results['Federal Republic of Germany']);
    }

    /** @test */
    public function findAllByCommonName()
    {
        $results = IsoCodes::countries()->findAllByCommonName();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('Bolivia', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $results['Bolivia']);
    }

    /** @test */
    public function findAllByName()
    {
        $results = IsoCodes::countries()->findAllByName();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('Denmark', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $results['Denmark']);
    }

    /** @test */
    public function findByAlpha2WithValue()
    {
        $result = IsoCodes::countries()->findByAlpha2('AU');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $result);
        $this->assertEquals('Australia', $result->getName());
    }

    /** @test */
    public function findByAlpha3WithValue()
    {
        $result = IsoCodes::countries()->findByAlpha3('USA');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $result);
        $this->assertEquals('United States', $result->getName());
    }

    /** @test */
    public function findByNumericWithValue()
    {
        $result = IsoCodes::countries()->findByNumeric('076');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $result);
        $this->assertEquals('Brazil', $result->getName());
    }

    /** @test */
    public function findByOfficialNameWithValue()
    {
        $result = IsoCodes::countries()->findByOfficialName('Federal Republic of Germany');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $result);
        $this->assertEquals('Germany', $result->getName());
    }

    /** @test */
    public function findByCommonNameWithValue()
    {
        $result = IsoCodes::countries()->findByCommonName('Bolivia');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $result);
        $this->assertEquals('Bolivia, Plurinational State of', $result->getName());
    }

    /** @test */
    public function findByNameWithValue()
    {
        $result = IsoCodes::countries()->findByName('Denmark');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $result);
        $this->assertEquals('Kingdom of Denmark', $result->getOfficialName());
    }
}
