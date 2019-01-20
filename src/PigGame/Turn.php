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
    public $dices;

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
        $this->dices = new Dices();

    }

    public function end() :void
    {
    //return if is already ended
    if($this->isOver) {return;}
    $this->player->setScore($this->player->getScore() + $this->score);
    $this->isOver = true;
    }

    public function snakeEnd() :void
    {
        $this->player->setScore(0);
        $this->isOver = true;
    }

    public function roll() :void
    {
        //return if ended
        if($this->isOver) {return;}
        //roll game
        $this->dices->roll();

        $results=$this->dices->values();
        //check if its one? - zero score
        if(in_array(1,$results)) {

            //check if its  11 - zero whole score
            if($results==[1,1])
            {
                $this->snakeEnd();
            } else {
                $this->score=0;
                $this->end();
            }
        }
        //save score
        else {
            $this->score+=array_sum($results);

        }
    }


}