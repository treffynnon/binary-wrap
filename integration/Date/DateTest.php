<?php

use \Treffynnon\BinaryWrap\Examples\Date\Date as D;

class DateTest extends PHPUnit_Framework_TestCase
{
    protected $d;

    public function __construct()
    {
        $this->d = new D;
    }

    public function testRfcDate()
    {
        $this->assertEquals($this->d->rfc(), strftime('%a, %d %b %Y %T %z'));
        $this->assertEquals(D::rfc(), strftime('%a, %d %b %Y %T %z'));
    }

    public function testLastFridayOfTheMonthCommand()
    {
        $d2 = new \DateTimeImmutable('last friday of this month');
        $this->assertEquals($this->d->lastFridayOfTheMonth()->getOutput(), (object) [
            'day' => $d2->format('d'),
            'month' => $d2->format('m'),
            'year' => $d2->format('y')
        ]);
        $this->assertEquals(D::lastFridayOfTheMonth()->getOutput(), (object) [
            'day' => $d2->format('d'),
            'month' => $d2->format('m'),
            'year' => $d2->format('y')
        ]);
    }

    public function testFormattedDate()
    {
        $this->assertEquals($this->d->formattedDate('%d %m %Y'), strftime('%d %m %Y'));
        $this->assertEquals($this->d->formattedDate('%a, %d %b %Y %T %z'), strftime('%a, %d %b %Y %T %z'));
        $this->assertEquals(D::formattedDate('%d %m %Y'), strftime('%d %m %Y'));
        $this->assertEquals(D::formattedDate('%a, %d %b %Y %T %z'), strftime('%a, %d %b %Y %T %z'));
    }
}
