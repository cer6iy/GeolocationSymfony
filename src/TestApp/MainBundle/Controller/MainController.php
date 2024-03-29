<?php

namespace TestApp\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Httpful\Request;
use TestApp\MainBundle\Entity\Contact;
use TestApp\MainBundle\Entity;

class MainController extends Controller
{
    public function contactAction($city)
    {
        $defaultCity = "Moscow";

        // get city by ip

        $currentCity = $city;

        $repository = $this->getDoctrine()->getRepository('TestAppMainBundle:Contact');
        //get contact by city english name
        $contact = $repository->findOneBy (array('city_en' => $currentCity));
        if (!$contact) {
            return $this->redirect(strtolower ($defaultCity));
        }

        $contacts = $repository->findAll();

        return $this->render('TestAppMainBundle:Default:index.html.twig', array('contacts' => $contacts, 'contact' => $contact));

        /*return new Response('<html><body> Created product id ' . $contact->getId() . $response->body->ip . "  " . $response->body->city->name_en . "  " . $response->body->city->name_ru . '</body></html>');*/

        //return new Response('<html><body> Добрый день, вы просматриваете страницу для города ' . $contact->getCityRu() .', телефон для справок: ' . $contact->getPhone() . '</body></html>');
    }
}
