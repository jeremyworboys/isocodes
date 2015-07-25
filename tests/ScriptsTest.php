<?php

namespace JeremyWorboys\IsoCodes;

class ScriptsTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function itContainsTheRightAmountOfScripts()
    {
        $scripts = IsoCodes::scripts();

        $this->assertCount(169, $scripts);
    }

    /** @test */
    public function itContainsOnlyScriptInstancesWhenIterated()
    {
        $scripts = IsoCodes::scripts();

        $this->assertContainsOnlyInstancesOf('JeremyWorboys\IsoCodes\Script', iterator_to_array($scripts));
    }

    /** @test */
    public function findAllByAlpha4()
    {
        $results = IsoCodes::scripts()->findAllByAlpha4();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('Hrkt', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Script', $results['Hrkt']);
    }

    /** @test */
    public function findAllByNumeric()
    {
        $results = IsoCodes::scripts()->findAllByNumeric();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('140', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Script', $results['140']);
    }

    /** @test */
    public function findAllByName()
    {
        $results = IsoCodes::scripts()->findAllByName();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('Latin', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Script', $results['Latin']);
    }

    /** @test */
    public function findByAlpha4WithValue()
    {
        $result = IsoCodes::scripts()->findByAlpha4('Hrkt');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Script', $result);
        $this->assertEquals('Japanese syllabaries (alias for Hiragana + Katakana)', $result->getName());
    }

    /** @test */
    public function findByNumericWithValue()
    {
        $result = IsoCodes::scripts()->findByNumeric('140');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Script', $result);
        $this->assertEquals('Mandaic, Mandaean', $result->getName());
    }

    /** @test */
    public function findByNameWithValue()
    {
        $result = IsoCodes::scripts()->findByName('Latin');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Script', $result);
        $this->assertEquals('Latn', $result->getAlpha4());
    }
}
