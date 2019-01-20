<?php
/**
 * Created by PhpStorm.
 * User: Damian
 * Date: 20/01/2019
 * Time: 13:30
 */

namespace App\PigGame;


class Player
{
    private $score = 0 ;
    private $name;

    /**
     * Player constructor.
     * @param string name
     */
    public function __construct(string $name)
    {
        $this->name=$name;
        $this->score=0;
    }

    /**
     * @return int
     */
    public function getScore() : int
    {
        return $this->score;
    }

    /**
     * @param int $score
     */
    public function setScore(int $score): void
    {
        $this->score = $score;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }



}