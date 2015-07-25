<?php

namespace JeremyWorboys\IsoCodes;

class SubdivisionTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function getCode()
    {
        $subdivision = $this->getSubdivision();

        $this->assertEquals('AL-BR', $subdivision->getCode());
    }

    /** @test */
    public function testGetName()
    {
        $subdivision = $this->getSubdivision();

        $this->assertEquals('Berat', $subdivision->getName());
    }

    /** @test */
    public function getParentCode()
    {
        $subdivision = $this->getSubdivision();

        $this->assertEquals('AL-01', $subdivision->getParentCode());
    }

    /** @test */
    public function getType()
    {
        $subdivision = $this->getSubdivision();

        $this->assertEquals('District', $subdivision->getType());
    }

    /** @test */
    public function getCountryCode()
    {
        $subdivision = $this->getSubdivision();

        $this->assertEquals('AL', $subdivision->getCountryCode());
    }

    /** @test */
    public function getParentWithParent()
    {
        $subdivision = $this->getSubdivision();
        $parent = Subdivisions::findByCode('AL-01');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Subdivision', $subdivision->getParent());
        $this->assertSame($parent, $subdivision->getParent());
    }

    /** @test */
    public function getParentWithoutParent()
    {
        $subdivision = $this->getSubdivisionWithoutParent();

        $this->assertNull($subdivision->getParent());
    }

    /** @test */
    public function getCountry()
    {
        $subdivision = $this->getSubdivision();
        $country = Countries::findByAlpha2('AL');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Country', $subdivision->getCountry());
        $this->assertSame($country, $subdivision->getCountry());
    }

    /**
     * @return \JeremyWorboys\IsoCodes\Subdivision
     */
    protected function getSubdivision()
    {
        return new Subdivision([
            'code'        => 'AL-BR',
            'name'        => 'Berat',
            'parentCode'  => 'AL-01',
            'type'        => 'District',
            'countryCode' => 'AL',
        ]);
    }

    /**
     * @return \JeremyWorboys\IsoCodes\Subdivision
     */
    protected function getSubdivisionWithoutParent()
    {
        return new Subdivision([
            'code'        => 'AU-NSW',
            'name'        => 'New South Wales',
            'parentCode'  => '',
            'type'        => 'State',
            'countryCode' => 'AU',
        ]);
    }
}
