<?php

namespace JeremyWorboys\PhpCountries;

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

    /**
     * @return \JeremyWorboys\PhpCountries\Subdivision
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
}
