<?php

namespace JeremyWorboys\IsoCodes;

class IsoCodesTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function countries()
    {
        $expected = Countries::sharedInstance();

        $this->assertSame($expected, IsoCodes::countries());
    }

    /** @test */
    public function languages()
    {
        $expected = Languages::sharedInstance();

        $this->assertSame($expected, IsoCodes::languages());
    }

    /** @test */
    public function currencies()
    {
        $expected = Currencies::sharedInstance();

        $this->assertSame($expected, IsoCodes::currencies());
    }

    /** @test */
    public function scripts()
    {
        $expected = Scripts::sharedInstance();

        $this->assertSame($expected, IsoCodes::scripts());
    }

    /** @test */
    public function subdivisions()
    {
        $expected = Subdivisions::sharedInstance();

        $this->assertSame($expected, IsoCodes::subdivisions());
    }
}
