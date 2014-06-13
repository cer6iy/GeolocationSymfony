<?php

namespace TestApp\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $buzz = $this->container->get('buzz');
        $output = $buzz->get('http://api.sypexgeo.net/');

        return new Response('<html><body>' . $output . '</body></html>');
    }
}
