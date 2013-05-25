<?php
namespace Scalopus\MeasurementUnit;
use Scalopus\MeasurementUnit\ThaiArea;

class ThaiAreaTest extends \PHPUnit_Framework_TestCase 
{
    public function testConstructureByMetreAsExpected()
    {
        $area = new ThaiArea(array('rai' => 1));
        $actual = $area->getArea();
        $this->assertEquals(1,$actual['rai']);

    }

    /**
    * @dataProvider provideSquareMetre
    */
    public function testThaiAreaFromSquareMetre($sqm,$thaiunit)
    {
        $area = new ThaiArea();
        $area->setSquareMetre($sqm);
        $actual = $area->getArea();
        $this->assertEquals($thaiunit[ThaiArea::RAI],$actual[ThaiArea::RAI]);
        $this->assertEquals($thaiunit[ThaiArea::NGAN],$actual[ThaiArea::NGAN]);
        $this->assertEquals($thaiunit[ThaiArea::SWAH],$actual[ThaiArea::SWAH]);
    }

    /**
    * @dataProvider provideSquareMetre
    */
    public function testGetSquareMetreFromThaiArea($sqm,$thaiunit)
    {
        $area = new ThaiArea($thaiunit);
        $actual = $area->getSquareMetre();
        $this->assertEquals($sqm,$actual);
    }

    public function provideSquareMetre()
    {
        return array(
            array(0, array(ThaiArea::RAI => 0, ThaiArea::NGAN => 0, ThaiArea::SWAH => 0)),
            array(1, array(ThaiArea::RAI => 0, ThaiArea::NGAN => 0, ThaiArea::SWAH => 0.25)),
            array(2, array(ThaiArea::RAI => 0, ThaiArea::NGAN => 0, ThaiArea::SWAH => 0.50)),
            array(3, array(ThaiArea::RAI => 0, ThaiArea::NGAN => 0, ThaiArea::SWAH => 0.75)),
            array(4, array(ThaiArea::RAI => 0, ThaiArea::NGAN => 0, ThaiArea::SWAH => 1)),
            array(399, array(ThaiArea::RAI => 0, ThaiArea::NGAN => 0, ThaiArea::SWAH => 99.75)),
            array(400, array(ThaiArea::RAI => 0, ThaiArea::NGAN => 1, ThaiArea::SWAH => 0)),
            array(401, array(ThaiArea::RAI => 0, ThaiArea::NGAN => 1, ThaiArea::SWAH => 0.25)),
            array(1599, array(ThaiArea::RAI => 0, ThaiArea::NGAN => 3, ThaiArea::SWAH => 99.75)),
            array(1600, array(ThaiArea::RAI => 1, ThaiArea::NGAN => 0, ThaiArea::SWAH => 0)),
            array(1601, array(ThaiArea::RAI => 1, ThaiArea::NGAN => 0, ThaiArea::SWAH => 0.25)),
        );
    }
}