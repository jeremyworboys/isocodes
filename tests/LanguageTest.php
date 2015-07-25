<?php

namespace JeremyWorboys\IsoCodes;

class LanguageTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function getIso6393Code()
    {
        $language = $this->getLanguage();

        $this->assertEquals('ben', $language->getIso6393Code());
    }

    /** @test */
    public function getIso6391Code()
    {
        $language = $this->getLanguage();

        $this->assertEquals('bn', $language->getIso6391Code());
    }

    /** @test */
    public function getIso6392TCode()
    {
        $language = $this->getLanguage();

        $this->assertEquals('ben', $language->getIso6392TCode());
    }

    /** @test */
    public function testGetStatus()
    {
        $language = $this->getLanguage();

        $this->assertEquals('Active', $language->getStatus());
    }

    /** @test */
    public function getScope()
    {
        $language = $this->getLanguage();

        $this->assertEquals('I', $language->getScope());
    }

    /** @test */
    public function getType()
    {
        $language = $this->getLanguage();

        $this->assertEquals('L', $language->getType());
    }

    /** @test */
    public function getInvertedName()
    {
        $language = $this->getLanguageWithInvertedName();

        $this->assertEquals('Cornish, Middle', $language->getInvertedName());
    }

    /** @test */
    public function getReferenceName()
    {
        $language = $this->getLanguage();

        $this->assertEquals('Bengali', $language->getReferenceName());
    }

    /** @test */
    public function testGetName()
    {
        $language = $this->getLanguage();

        $this->assertEquals('Bengali', $language->getName());
    }

    /** @test */
    public function getCommonName()
    {
        $language = $this->getLanguage();

        $this->assertEquals('Bangla', $language->getCommonName());
    }

    /**
     * @return \JeremyWorboys\IsoCodes\Language
     */
    protected function getLanguage()
    {
        return new Language([
            'iso6393Code'   => 'ben',
            'iso6391Code'   => 'bn',
            'iso6392TCode'  => 'ben',
            'status'        => 'Active',
            'scope'         => 'I',
            'type'          => 'L',
            'invertedName'  => '',
            'referenceName' => 'Bengali',
            'name'          => 'Bengali',
            'commonName'    => 'Bangla',
        ]);
    }

    /**
     * @return \JeremyWorboys\IsoCodes\Language
     */
    protected function getLanguageWithInvertedName()
    {
        return new Language([
            'iso6393Code'   => 'cnx',
            'iso6391Code'   => '',
            'iso6392TCode'  => '',
            'status'        => 'Active',
            'scope'         => 'I',
            'type'          => 'H',
            'invertedName'  => 'Cornish, Middle',
            'referenceName' => 'Middle Cornish',
            'name'          => 'Cornish, Middle',
            'commonName'    => '',
        ]);
    }
}
