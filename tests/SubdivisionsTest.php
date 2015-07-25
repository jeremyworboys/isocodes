<?php

namespace JeremyWorboys\IsoCodes;

class SubdivisionsTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function itContainsTheRightAmountOfSubdivisions()
    {
        $subdivisions = Subdivisions::sharedInstance();

        $this->assertCount(4847, $subdivisions);
    }

    /** @test */
    public function itContainsOnlySubdivisionInstancesWhenIterated()
    {
        $subdivisions = Subdivisions::sharedInstance();

        $this->assertContainsOnlyInstancesOf('JeremyWorboys\IsoCodes\Subdivision', iterator_to_array($subdivisions));
    }

    /** @test */
    public function findAllByCode()
    {
        $results = Subdivisions::findAllByCode();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('US-KY', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Subdivision', $results['US-KY']);
    }

    /** @test */
    public function findAllByCountryCode()
    {
        $results = Subdivisions::findAllByCountryCode();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('AU', $results);
        $this->assertInternalType('array', $results['AU']);
        $this->assertContainsOnlyInstancesOf('JeremyWorboys\IsoCodes\Subdivision', $results['AU']);
    }

    /** @test */
    public function findByCodeWithValue()
    {
        $result = Subdivisions::findByCode('US-KY');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Subdivision', $result);
        $this->assertEquals('Kentucky', $result->getName());
    }

    /** @test */
    public function findByCountryCodeWithValue()
    {
        $results = Subdivisions::findByCountryCode('AU');

        $this->assertInternalType('array', $results);
        $this->assertContainsOnlyInstancesOf('JeremyWorboys\IsoCodes\Subdivision', $results);
        $this->assertEquals('New South Wales', $results[0]->getName());
    }
}
