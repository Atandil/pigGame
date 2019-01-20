<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 20/01/2019
 * Time: 00:17
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;

use App\PigGame\Game;

class DefaultController extends AbstractController
{

    public function index()
    {

        $session = new Session(new NativeSessionStorage(), new AttributeBag());

        $game=$session->get('game');

        if($game) {
            return $this->render('game.html.twig',
                ['game' => $game ]);
        } else {
            return $this->render('index.html.twig');
        }

    }

    public function test()
    {
        return new Response('Test');
    }

}
