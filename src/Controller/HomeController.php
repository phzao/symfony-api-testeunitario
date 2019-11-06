<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController
{
    /**
     * @Route("/")
    */
    public function index()
    {
        return $this->render('base.html.twig');
    }
}