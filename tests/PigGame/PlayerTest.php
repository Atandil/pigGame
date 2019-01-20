<?php
namespace App\Tests\PigGame;

use App\PigGame\Player;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{

    public function testName()
    {
        $player = new Player("Adam");
        $this->assertEquals('Adam',$player->getName());

    }

    public function testStartScore()
    {
        $player = new Player("Adam");
        $this->assertEquals(0,$player->getScore());

    }

    public function testScore()
    {
        $player = new Player("Adam");
        $player->setScore(5);
        $this->assertEquals(5,$player->getScore());

    }

}
