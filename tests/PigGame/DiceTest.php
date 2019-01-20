<?php
/**
 * Created by PhpStorm.
 * Author: Damian Barczyk
 * Date: 20/01/2019
 * Time: 15:57
 */

namespace App\Tests\PigGame;

use PHPUnit\Framework\TestCase;
use App\PigGame\Dice;

class DiceTest extends TestCase
{

    public function testRollIfSetFixed()
    {
        $dice=new Dice();
        $dice->setFixed(5);
        $dice->roll();
        $this->assertEquals(5,$dice->getValue());

    }

}
