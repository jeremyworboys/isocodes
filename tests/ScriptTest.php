<?php

namespace JeremyWorboys\PhpCountries;

class ScriptTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function getLetter()
    {
        $script = $this->getScript();

        $this->assertEquals('Egyp', $script->getAlpha4());
    }

    /** @test */
    public function getNumeric()
    {
        $script = $this->getScript();

        $this->assertEquals('050', $script->getNumeric());
    }

    /** @test */
    public function testGetName()
    {
        $script = $this->getScript();

        $this->assertEquals('Egyptian hieroglyphs', $script->getName());
    }

    /**
     * @return \JeremyWorboys\PhpCountries\Script
     */
    protected function getScript()
    {
        return new Script([
            'alpha4'  => 'Egyp',
            'numeric' => '050',
            'name'    => 'Egyptian hieroglyphs',
        ]);
    }
}
