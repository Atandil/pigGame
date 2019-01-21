<?php
/**
 * Created by PhpStorm.
 * Author: Damian Barczyk
 * Date: 20/01/2019
 * Time: 18:12
 */

namespace App\Tests\PigGame;

use App\PigGame\Game;
use App\PigGame\Player;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    private $player1;
    private $player2;
    /*
     * @var Game
     */
    private $game;

  public function setUp() {
      $this->player1 = new Player("Adam");
      $this->player2 = new Player("Eva");
      $game=new Game();
      $game->addPlayer($this->player1);
      $game->addPlayer($this->player2);
      $game->start();
      $this->game=$game;

  }


  public function testStartGameWithoutPlayer(){
     $game = new Game();
     $this->expectException('Exception');
     $this->expectExceptionMessage("Minimum 2 players");
     $game->start();

  }

    public function testStartGameOnePlayer(){
        $game = new Game();
        $game->addPlayer($this->player1);
        $this->expectException('Exception');
        $this->expectExceptionMessage("Minimum 2 players");
        $game->start();

    }

    public function testStartGameTwoPlayers(){
        $game = new Game();
        $game->addPlayer($this->player1);
        $game->addPlayer($this->player2);
        $game->start();
        $this->assertTrue($game->isStarted());

    }

    public function testStartGameTreePlayers(){
        $game = new Game();
        $game->addPlayer($this->player1);
        $game->addPlayer($this->player2);
        $game->addPlayer(new Player("Olaf"));
        $game->start();
        $this->assertTrue($game->isStarted());

    }

  public function testCurrentPlayerIsPlayer1() {
    $this->assertEquals($this->player1, $this->game->getPlayer());
  }

    public function testCheckNextPlayerIndex() {
        $index=$this->game->nextPlayerIndex();
        $this->assertEquals(1, $index);
    }

    public function testStartNextTurn() {
        $this->game->nextTurn();
        $this->assertEquals($this->player2, $this->game->getPlayer());
    }

    public function testRoundPlayers() {
        $this->game->nextTurn();
        $this->game->nextTurn();
        $this->assertEquals($this->player1, $this->game->getPlayer());
    }


    public function testIsOver_initial() {
        $this->assertFalse($this->game->isOver());
    }


    public function testIsOverPlayer1Has100Points() {
        $this->game->getPlayer()->setScore(100);
        $this->game->stopRolling();
        $this->assertTrue($this->game->isOver());
      }

    public function testIsOverPlayer1HasOver100Points() {
        $this->game->getPlayer()->setScore(120);
        $this->game->stopRolling();
        $this->assertTrue($this->game->isOver());
    }


  public function testGetWinnerPlayer() {
      $this->game->getPlayer()->setScore(120);
      $this->game->stopRolling();
      $this->assertEquals($this->player1, $this->game->getWinner());
  }

    public function testGetRollValues() {
        $this->game->getTurn()->dices->fakeRoll(5,5);
        $this->game->roll();
        $out=[5,5];
        $this->assertEquals($out,$this->game->values());
    }

}
