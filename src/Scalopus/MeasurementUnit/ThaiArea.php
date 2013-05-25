<?php
namespace Scalopus\MeasurementUnit;

class ThaiArea
{
    const RAI = 'rai';
    const NGAN = 'ngan';
    const SWAH = 'swah';
    
    protected $rai = 0;
    protected $ngan = 0;
    protected $swah = 0;


    public function __construct($arrayofvalue = null)
    {
        if (isset($arrayofvalue[self::RAI])){
            $this->rai = $arrayofvalue[self::RAI];
        }

        if (isset($arrayofvalue[self::NGAN])){
            $this->ngan = $arrayofvalue[self::NGAN];
        }

        if (isset($arrayofvalue[self::SWAH])){
            $this->swah = $arrayofvalue[self::SWAH];
        }
    }

    public function getArea() {
        return array(self::RAI => $this->rai, self::NGAN => $this->ngan, self::SWAH => $this->swah);
    }

    public function getSquareMetre() {
        return ($this->rai * 1600) + ($this->ngan * 400) + ($this->swah * 4);
    }

    public function setSquareMetre($square_metres) {
        $this->rai = floor($square_metres / 1600);
        $mod = $square_metres % 1600;
        $this->ngan = floor($mod / 400);
        $mod = $mod % 400;
        $this->swah = $mod / 4;
    }

}