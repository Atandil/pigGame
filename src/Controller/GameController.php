<?php
/**
 * Created by PhpStorm.
 * Author: Damian Barczyk
 * Date: 20/01/2019
 * Time: 20:37
 */

namespace App\Controller;

use App\Form\PlayerType;
use App\PigGame\Game;
use App\PigGame\Player;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;



class GameController extends AbstractController
{

    public function index()
    {
        return $this->redirectToRoute('index');
    }

    public function new()
    {
        $session = new Session(new NativeSessionStorage(), new AttributeBag());

        $session->remove('game');

        $game  = new Game();
        $session->set('game',$game);

        return $this->redirectToRoute('index');
    }

    public function start()
    {
        $session = new Session(new NativeSessionStorage(), new AttributeBag());

        $game=$session->get('game');

        $game->start();

        $session->set('game',$game);

        return $this->redirectToRoute('index');
    }

    public function addPlayer(Request $request)
    {
        $session = new Session(new NativeSessionStorage(), new AttributeBag());

        $form = $this->createForm(PlayerType::class, array());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            if($data['name']) {
                $game = $session->get('game');
                $player = new Player($data['name']);
                $game->addPlayer($player);

                $session->set('game', $game);
            }

            return $this->redirectToRoute('index');

        }


        return $this->render('game/add_player.html.twig',
            ['form' => $form->createView()]);
    }

    public function roll()
    {
        $session = new Session(new NativeSessionStorage(), new AttributeBag());

        $game=$session->get('game');

        if(!$game) {
            return $this->redirectToRoute('index');
        }

        $game->roll();
        $session->set('game',$game);

        return $this->redirectToRoute('index');
    }

    public function turn()
    {
        $session = new Session(new NativeSessionStorage(), new AttributeBag());

        $game=$session->get('game');

        if(!$game) {
            return $this->redirectToRoute('index');
        }

        $game->endTurn();
        $session->set('game',$game);

        return $this->redirectToRoute('index');
    }

}
