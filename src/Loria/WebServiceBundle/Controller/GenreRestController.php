<?php

namespace Loria\WebServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Loria\WebServiceBundle\Entity\Genre;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Controller\Annotations\Method;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class GenreRestController extends \FOS\RestBundle\Controller\FOSRestController
{

  public function getGenreAction($id){
  
		
    $genre = $this->getDoctrine()->getRepository('LoriaWebServiceBundle:Genre')->find($id);
    if(!is_object($genre)){
      throw $this->createNotFoundException();
    }
    return $genre;
  }


  public function postGenreAction(){
	return "hu";
 }
  
}