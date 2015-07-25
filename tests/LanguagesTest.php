<?php

namespace JeremyWorboys\IsoCodes;

class LanguagesTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function itContainsTheRightAmountOfLanguages()
    {
        $languages = IsoCodes::languages();

        $this->assertCount(7874, $languages);
    }

    /** @test */
    public function itContainsOnlyLanguageInstancesWhenIterated()
    {
        $languages = IsoCodes::languages();

        $this->assertContainsOnlyInstancesOf('JeremyWorboys\IsoCodes\Language', iterator_to_array($languages));
    }

    /** @test */
    public function findAllByIso6393Code()
    {
        $results = IsoCodes::languages()->findAllByIso6393Code();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('cnx', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Language', $results['cnx']);
    }

    /** @test */
    public function findAllByIso6391Code()
    {
        $results = IsoCodes::languages()->findAllByIso6391Code();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('eo', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Language', $results['eo']);
    }

    /** @test */
    public function findAllByIso6392TCode()
    {
        $results = IsoCodes::languages()->findAllByIso6392TCode();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('enm', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Language', $results['enm']);
    }

    /** @test */
    public function findAllByName()
    {
        $results = IsoCodes::languages()->findAllByName();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('Latin', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Language', $results['Latin']);
    }

    /** @test */
    public function findByIso6393CodeWithValue()
    {
        $result = IsoCodes::languages()->findByIso6393Code('cnx');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Language', $result);
        $this->assertEquals('Cornish, Middle', $result->getName());
    }

    /** @test */
    public function findByIso6391CodeWithValue()
    {
        $result = IsoCodes::languages()->findByIso6391Code('eo');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Language', $result);
        $this->assertEquals('Esperanto', $result->getName());
    }

    /** @test */
    public function findByIso6392TCodeWithValue()
    {
        $result = IsoCodes::languages()->findByIso6392TCode('enm');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Language', $result);
        $this->assertEquals('English, Middle (1100-1500)', $result->getName());
    }

    /** @test */
    public function findByNameWithValue()
    {
        $result = IsoCodes::languages()->findByName('Latin');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Language', $result);
        $this->assertEquals('lat', $result->getIso6393Code());
    }
}
