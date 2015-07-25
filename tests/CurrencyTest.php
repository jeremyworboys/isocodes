<?php

namespace JeremyWorboys\PhpCountries;

class CurrencyTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function getLetter()
    {
        $currency = $this->getCurrency();

        $this->assertEquals('MDL', $currency->getLetter());
    }

    /** @test */
    public function getNumeric()
    {
        $currency = $this->getCurrency();

        $this->assertEquals('498', $currency->getNumeric());
    }

    /** @test */
    public function testGetName()
    {
        $currency = $this->getCurrency();

        $this->assertEquals('Moldovan Leu', $currency->getName());
    }

    /**
     * @return \JeremyWorboys\PhpCountries\Currency
     */
    protected function getCurrency()
    {
        return new Currency([
            'letter'  => 'MDL',
            'numeric' => '498',
            'name'    => 'Moldovan Leu',
        ]);
    }
}
