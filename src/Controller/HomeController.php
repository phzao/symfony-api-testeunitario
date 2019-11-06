<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController
{
    /**
     * @Route("/home")
    */
    public function index()
    {
        return new Response('<html><div>Jenkins works</div></html>');
    }
}