<?php

namespace JeremyWorboys\IsoCodes;

class CurrenciesTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function itContainsTheRightAmountOfCurrencies()
    {
        $currencies = Currencies::sharedInstance();

        $this->assertCount(182, $currencies);
    }

    /** @test */
    public function itContainsOnlyCurrencyInstancesWhenIterated()
    {
        $currencies = Currencies::sharedInstance();

        $this->assertContainsOnlyInstancesOf('JeremyWorboys\IsoCodes\Currency', iterator_to_array($currencies));
    }

    /** @test */
    public function findAllByLetter()
    {
        $results = Currencies::findAllByLetter();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('AUD', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Currency', $results['AUD']);
    }

    /** @test */
    public function findAllByNumeric()
    {
        $results = Currencies::findAllByNumeric();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('986', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Currency', $results['986']);
    }

    /** @test */
    public function findAllByName()
    {
        $results = Currencies::findAllByName();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('Danish Krone', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Currency', $results['Danish Krone']);
    }

    /** @test */
    public function findByLetterWithValue()
    {
        $result = Currencies::findByLetter('AUD');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Currency', $result);
        $this->assertEquals('Australian Dollar', $result->getName());
    }

    /** @test */
    public function findByNumericWithValue()
    {
        $result = Currencies::findByNumeric('986');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Currency', $result);
        $this->assertEquals('Brazilian Real', $result->getName());
    }

    /** @test */
    public function findByNameWithValue()
    {
        $result = Currencies::findByName('Danish Krone');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Currency', $result);
        $this->assertEquals('DKK', $result->getLetter());
    }
}
