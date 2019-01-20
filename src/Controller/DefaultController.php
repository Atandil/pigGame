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

class DefaultController extends AbstractController
{

    public function index()
    {
        return $this->render('index.html.twig');
    }

    public function test()
    {
        return new Response('Test');
    }

}
