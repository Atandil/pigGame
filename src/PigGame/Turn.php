<?php
/**
 * Created by PhpStorm.
 * User: Damian
 * Date: 20/01/2019
 * Time: 13:27
 */

namespace App\PigGame;

//use App\PigGame\Player;


class Turn
{
    private $score = 0;
    private $isOver = false;
    private $player;

    /**
     * @return bool
     */
    public function isOver(): bool
    {
        return $this->isOver;
    }

    /**
     * @param bool $isOver
     */
    public function setIsOver(bool $isOver): void
    {
        $this->isOver = $isOver;
    }


    /**
     * @return Player
     */
    public function getPlayer() : Player
    {
        return $this->player;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    public function __construct(Player &$player)
    {
        $this->player=$player;
        $this->score =0;

    }

    public function end() :void
    {
    $this->player->setScore($this->player->getScore() + $this->score);
    $this->isOver = true;
    }

    public function snakeEnd() :void
    {
        $this->player->setScore(0);
        $this->isOver = true;
    }

    public function roll()
    {
        //roll dice
        //check if its one? - zero score
          //check if its  11 - zero whole score
          //end turn


        //dummy return
        $out=[2,3];

        return $out;
    }


}