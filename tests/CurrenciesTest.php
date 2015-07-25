<?php

namespace JeremyWorboys\IsoCodes;

class CurrenciesTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function itContainsTheRightAmountOfCurrencies()
    {
        $currencies = IsoCodes::currencies();

        $this->assertCount(182, $currencies);
    }

    /** @test */
    public function itContainsOnlyCurrencyInstancesWhenIterated()
    {
        $currencies = IsoCodes::currencies();

        $this->assertContainsOnlyInstancesOf('JeremyWorboys\IsoCodes\Currency', iterator_to_array($currencies));
    }

    /** @test */
    public function findAllByLetter()
    {
        $results = IsoCodes::currencies()->findAllByLetter();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('AUD', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Currency', $results['AUD']);
    }

    /** @test */
    public function findAllByNumeric()
    {
        $results = IsoCodes::currencies()->findAllByNumeric();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('986', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Currency', $results['986']);
    }

    /** @test */
    public function findAllByName()
    {
        $results = IsoCodes::currencies()->findAllByName();

        $this->assertInternalType('array', $results);
        $this->assertArrayHasKey('Danish Krone', $results);
        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Currency', $results['Danish Krone']);
    }

    /** @test */
    public function findByLetterWithValue()
    {
        $result = IsoCodes::currencies()->findByLetter('AUD');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Currency', $result);
        $this->assertEquals('Australian Dollar', $result->getName());
    }

    /** @test */
    public function findByNumericWithValue()
    {
        $result = IsoCodes::currencies()->findByNumeric('986');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Currency', $result);
        $this->assertEquals('Brazilian Real', $result->getName());
    }

    /** @test */
    public function findByNameWithValue()
    {
        $result = IsoCodes::currencies()->findByName('Danish Krone');

        $this->assertInstanceOf('JeremyWorboys\IsoCodes\Currency', $result);
        $this->assertEquals('DKK', $result->getLetter());
    }
}
