<?php
/**
 * Created by PhpStorm.
 * User: Damian
 * Date: 20/01/2019
 * Time: 12:15
 */

namespace App\PigGame;


class Game
{
    private $pointsWin = 100;
    private $isOver = false;
    private $isStarted = false;

    //players array
    public $players = [];

    /*
     * @var Player
     */
    private $winner;

    /*
     * @var Turn
     */
    private $turn;

    public function isOver() : bool
    {
    return $this->isOver;
    }

    public function isStarted() : bool
    {
        return $this->isStarted;
    }

    public function countPlayers() : int
    {
        return count($this->players);
    }

    public function addPlayer(Player $player) {
        $this->players[]=$player;
    }


    public function getPlayer()  :Player
    {
        if ($this->isOver()) {
            throw new \Exception("The game is over");
        }elseif (!$this->isStarted()) {
            throw new \Exception("The game is not started");
        }
        return $this->turn->getPlayer();
    }

    public function nextPlayerIndex() : int
    {
        if ($this->countPlayers()==0) {
            throw new \Exception("No Players");
        }
        //Find Current Index
        $curr=array_search($this->getPlayer(),$this->players);

        //find next index
        if($curr+1>=$this->countPlayers()) {
            $next=0;
        } else {
            $next=$curr+1;
        }
        return $next;
    }

    public function nextTurn() {
        if ($this->isOver()) {
            throw new \Exception("The game is over");
        }elseif (!$this->isStarted()) {
            throw new \Exception("The game is not started");
        }
        $index=$this->nextPlayerIndex();
        $this->turn = new Turn($this->players[$index]);
    }

    public function start() : void
    {
        if ($this->countPlayers()<2) {
            throw new \Exception("Minimum 2 players");
        }

        $this->turn=new Turn($this->players[0]);
        $this->isStarted=true;

    }

    public function roll() {
        if ($this->isOver()) {
            throw new \Exception("The game is over");
        }elseif (!$this->isStarted()) {
            throw new \Exception("The game is not started");
        } else {
            $this->turn->roll();
        }

    }

    public function values() {
        if (!$this->isStarted()) {
            throw new \Exception("The game is not started");
        } else {
            $this->turn->dices->values();
        }

    }

    public function stopRolling() {
        if ($this->isOver()) {
            throw new \Exception("The game is over");
        }elseif (!$this->isStarted()) {
            throw new \Exception("The game is not started");
        }
        $this->turn->end();
        if ($this->getPlayer()->getScore() >= $this->pointsWin) {
            $this->winner = $this->getPlayer();
            $this->isOver = true;
        }
    }

     public function getWinner()
     {
         if (!$this->isOver()) {
             throw new \Exception("The game is not over");
         }elseif (!$this->isStarted()) {
             throw new \Exception("The game is not started");
         } else {
             return $this->winner;
         }
     }

    public function getTurn() : Turn {
        if ($this->isOver()) {
            throw new \Exception("The game is over");
        }elseif (!$this->isStarted()) {
            throw new \Exception("The game is not started");
        }
        return $this->turn;
    }










}