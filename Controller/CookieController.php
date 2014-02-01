<?php

namespace ConWeb\CookieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;

class CookieController extends Controller
{

    public function acceptAction()
    {
        $response = new Response();
        $cookie = new Cookie('cookie_agree', 1, new \DateTime('+30 days'));
        $response->headers->setCookie($cookie);

        return $response;
    }
}
