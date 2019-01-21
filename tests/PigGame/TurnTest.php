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
    /*
     * @var Player
     */
    private $player ;

    public function setUp() {
        $this->player = new Player("Test Player");
    }


    public function testIsOverIsFalseOnBegin()
    {
        $turn = new Turn($this->player);
        $this->assertFalse($turn->isOver());
    }

    public function testIsOverIsFalseOnNormalRoll()
    {
        $turn = new Turn($this->player);
        $turn->roll();
        $this->assertFalse($turn->isOver());
    }

    public function testIsOverAfterOneRoll()
    {
        $turn = new Turn($this->player);
        $turn->dices->fakeRoll(1,5);
        $turn->roll();
        $this->assertTrue($turn->isOver());
    }

    public function testIsOverAfterSnakeRoll()
    {
        $turn = new Turn($this->player);
        $turn->dices->fakeRoll(1,1);
        $turn->roll();
        $this->assertTrue($turn->isOver());
    }

    public function testIsOverAfterEnd()
    {
        $turn = new Turn($this->player);
        $turn->end();
        $this->assertTrue($turn->isOver());
    }

    public function testStartZero()
    {
        $turn = new Turn($this->player);
        $this->assertEquals(0,$turn->getScore());
    }

    public function testRollSumScore()
    {
        $turn = new Turn($this->player);
        $turn->dices->fakeRoll(3,4);
        $turn->roll();
        $this->assertEquals(7,$turn->getScore());
    }

    public function testPlayerScoreAfterEnd()
    {
        $turn = new Turn($this->player);
        $turn->dices->fakeRoll(3,4);
        $turn->roll();
        $turn->end();
        $this->assertEquals(7,$this->player->getScore());
    }

    public function testPlayerScoreAfterFewRollsEnd()
    {
        $turn = new Turn($this->player);
        $turn->dices->fakeRoll(3,4);
        $turn->roll();
        $turn->dices->fakeRoll(5,5);
        $turn->roll();
        $turn->dices->fakeRoll(6,4);
        $turn->roll();
        $turn->end();
        $this->assertEquals(27,$this->player->getScore());
    }


    public function testPlayerScoreAfterOneRollOnBeginningOfTurn()
    {
        $this->player->setScore(10);
        $turn = new Turn($this->player);
        $turn->dices->fakeRoll(1,4);
        $turn->roll();
        $this->assertEquals(10,$this->player->getScore());
    }

    public function testPlayerScoreAfterOneRoll()
    {
        $this->player->setScore(10);
        $turn = new Turn($this->player);
        $turn->dices->fakeRoll(3,4);
        $turn->roll();
        $turn->dices->fakeRoll(5,5);
        $turn->roll();
        $turn->dices->fakeRoll(6,1);
        $turn->roll();
        $this->assertEquals(10,$this->player->getScore());
    }

    public function testPlayerScoreAfterSnakeRoll()
    {
        $this->player->setScore(10);
        $turn = new Turn($this->player);
        $turn->dices->fakeRoll(4,3);
        $turn->roll();
        $turn->dices->fakeRoll(5,5);
        $turn->roll();
        $turn->dices->fakeRoll(1,1);
        $turn->roll();
        $this->assertEquals(0,$this->player->getScore());
    }

    public function testEndEndedTurnNotChangeScore(){
        $turn = new Turn($this->player);
        $turn->dices->fakeRoll(5,5);
        $turn->roll();
        $turn->end();
        $beginScore=$turn->getScore();
        $turn->end();
        $endScore=$turn->getScore();
        $this->assertEquals($beginScore,$endScore);

    }

    public function testRollEndedTurnNotChangeScore(){
        $turn = new Turn($this->player);
        $turn->dices->fakeRoll(5,5);
        $turn->roll();
        $turn->end();
        $beginScore=$turn->getScore();
        $turn->dices->fakeRoll(5,5);
        $endScore=$turn->getScore();
        $this->assertEquals($beginScore,$endScore);

    }

    public function testDiceValueAfterRoll () {
        $turn = new Turn($this->player);
        $turn->dices->fakeRoll(5,5);
        $turn->roll();
        $out=[5,5];
        $this->assertEquals($out,$turn->dices->values());

    }



}
