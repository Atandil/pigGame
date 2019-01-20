<?php
/**
 * Created by PhpStorm.
 * Author: Damian Barczyk
 * Date: 20/01/2019
 * Time: 15:34
 */

namespace App\PigGame;


class Dice implements DiceInterface
{

    private $fixed;
    private $value;

    /**
     * Dice constructor.
     */
    public function __construct()
    {
        $this->value=0;
    }

    /**
     * @return mixed
     */
    public function getValue() : int
    {
        return $this->value;
    }


    /**
     * Roll a dice get 1-6 int
     * @return void
     */
    public function roll(): void
    {
        if($this->fixed)
        {
             $this->value=$this->fixed;
        } else
        {
            $this->value= rand(1,6);
        }
    }

    /**
     * Prepare fake roll with fixed value
     * @param int $val
     * @return mixed|void
     */
    public function setFixed(int $val) :void
    {
        /*if($val<1 || $val > 6)
        {
            throw new \Exception("Out of dice range");
        }*/
        $this->fixed=$val;
    }
}