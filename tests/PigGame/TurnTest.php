<?php
/**
 * Created by PhpStorm.
 * Author: Damian Barczyk
 * Date: 20/01/2019
 * Time: 14:52
 */

namespace App\Tests\PigGame;

use App\PigGame\Turn;
use App\PigGame\Player;
use PHPUnit\Framework\TestCase;

class TurnTest extends TestCase
{
    private $player;

    public function setUp() {
        $this->player = new Player("Test Player");
    }

    public function testIsOver()
    {
        $turn = new Turn($this->player);
        $turn->end();
        $this->assertTrue($turn->isOver());
    }
}
