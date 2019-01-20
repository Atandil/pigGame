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
    private $isOver = false;
    private $isStarted = false;

    //players array
    private $players = [];
    private $winner;

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

    public function start() : void
    {
        if ($this->countPlayers()<2) {
            throw new \Exception("Minimum 2 players");
        }
        $this->isStarted=true;
    }

     public function getWinner()
     {
         if (!$this->isOver()) {
             throw new \Exception("The game is not over");
         } else {
             return $this->winner;
         }
     }

    public function getTurn() : Turn {
        return $this->turn;
    }










}