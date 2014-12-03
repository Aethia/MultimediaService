<?php

namespace Loria\WebServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Loria\WebServiceBundle\Entity\Genre;
use Symfony\Component\HttpFoundation\Response;


class GenreController extends Controller
{
    public function indexAction($id)
    {
		$genre = new Genre();
		//$id = 1;
		$genre = $this->getDoctrine()->getRepository('LoriaWebServiceBundle:Genre')->find($id);

    if (!$genre) {
        throw $this->createNotFoundException(
            'Aucun produit trouvé pour cet id : '.$id
        );
    }
        return $this->render('LoriaWebServiceBundle:Genre:genre.html.twig', array('name' => $genre->getLibelle()));
    }
	
	
	
	
}
