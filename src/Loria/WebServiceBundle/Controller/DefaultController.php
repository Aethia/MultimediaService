<?php

namespace Loria\WebServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LoriaWebServiceBundle:Default:index.html.twig', array('name' => $name));
    }
	
	 /**
     * @Route("/loria/{name}", name="_demo_hello")
     * @Template()
     */
    public function helloAction($name)
    {
        return array('name' => $name);
    }
}
