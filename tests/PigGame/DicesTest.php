<?php
/**
 * Created by PhpStorm.
 * Author: Damian Barczyk
 * Date: 20/01/2019
 * Time: 16:29
 */

namespace App\Tests\PigGame;

use App\PigGame\Dices;
use PHPUnit\Framework\TestCase;

class DicesTest extends TestCase
{

    public function testFakeRoll()
    {
        $dices = new Dices();
        $dices->fakeRoll(1,2);
        $dices->roll();
        $out=[1,2];
        $this->assertEquals($out,$dices->values());

    }
}
