<?php
/**
 * Created by PhpStorm.
 * Just class to keep 2 dices and roll at once
 * Author: Damian Barczyk
 * Date: 20/01/2019
 * Time: 16:15
 */

namespace App\PigGame;


class Dices
{
    public $dice1;
    public $dice2;

    public function __construct()
    {
        $this->dice1= new Dice();
        $this->dice2= new Dice();
    }


    public function roll()
    {
        $this->dice1->roll();
        $this->dice2->roll();

    }

    public function fakeRoll(int $val1, int $val2)
    {
        $this->dice1->setFixed($val1);
        $this->dice1->roll();
        $this->dice2->setFixed($val2);
        $this->dice2->roll();

    }

    public function values() {
        $arr[]=$this->dice1->getValue();
        $arr[]=$this->dice2->getValue();

        return $arr;
    }


}