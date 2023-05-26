<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class MyLuckyController extends AbstractController
{
    #[Route("lucky")]
    public function number(): Response
    {
        return $this->render("/lucky/number.html.twig",[
            "number" => random_int(0, 100)
        ]);
    }
}