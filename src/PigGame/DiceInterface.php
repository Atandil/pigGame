<?php
/**
 * Created by PhpStorm.
 * Author: Damian Barczyk
 * Date: 20/01/2019
 * Time: 15:36
 */

namespace App\PigGame;


interface DiceInterface
{

    public function getValue() : int ;

    /**
     * Roll and get random number
     * @return void
     */
    public function roll() :void ;

    /**
     * Prepare "fake" roll
     * @param int $val
     * @return void
     */
    public function setFixed(int $val) : void ;
}