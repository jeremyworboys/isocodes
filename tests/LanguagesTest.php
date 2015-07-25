<?php

namespace JeremyWorboys\IsoCodes;

class LanguagesTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function itContainsTheRightAmountOfLanguages()
    {
        $languages = Languages::sharedInstance();

        $this->assertCount(7874, $languages);
    }

    /** @test */
    public function itContainsOnlyLanguageInstancesWhenIterated()
    {
        $languages = Languages::sharedInstance();

        $this->assertContainsOnlyInstancesOf('JeremyWorboys\IsoCodes\Language', iterator_to_array($languages));
    }

    /** @test */
    public function findAllByIso6393Code()
    {
        $results = Languages::findAllByIso6393Code();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('cnx', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Language', $results['cnx']);
    }

    /** @test */
    public function findAllByIso6391Code()
    {
        $results = Languages::findAllByIso6391Code();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('eo', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Language', $results['eo']);
    }

    /** @test */
    public function findAllByIso6392TCode()
    {
        $results = Languages::findAllByIso6392TCode();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('enm', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Language', $results['enm']);
    }

    /** @test */
    public function findAllByName()
    {
        $results = Languages::findAllByName();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('Latin', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Language', $results['Latin']);
    }

    /** @test */
    public function findByIso6393CodeWithValue()
    {
        $result = Languages::findByIso6393Code('cnx');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Language', $result);
        $this->assertEquals('Cornish, Middle', $result->getName());
    }

    /** @test */
    public function findByIso6391CodeWithValue()
    {
        $result = Languages::findByIso6391Code('eo');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Language', $result);
        $this->assertEquals('Esperanto', $result->getName());
    }

    /** @test */
    public function findByIso6392TCodeWithValue()
    {
        $result = Languages::findByIso6392TCode('enm');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Language', $result);
        $this->assertEquals('English, Middle (1100-1500)', $result->getName());
    }

    /** @test */
    public function findByNameWithValue()
    {
        $result = Languages::findByName('Latin');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Language', $result);
        $this->assertEquals('lat', $result->getIso6393Code());
    }
}
