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
    public function home()
    {
        return new Response('<html><div>Hello Jenkins</div></html>');
    }
}