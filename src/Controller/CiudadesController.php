<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Ciudad;
use App\Entity\Provincia;


/**
 * @Route("/api", name="api_")
 */

class CiudadesController extends AbstractController
{
   /**
   * @Route("/ciudades", name="app_ciudades"  )
   */

    public function index(): JsonResponse
    {

        $em = $this->getDoctrine()->getManager();
        $lista = $em->getRepository(Ciudad::class)
            ->findAll();

        $resultado = array();
        foreach($lista as $ciudad){
          $dato=array();
          $dato["ciudad"]=$ciudad->getDescripcion();
          $dato["provincia"]=$ciudad->getProvincia()->getDescripcion();
          $resultado[]=$dato;
        }


        return $this->json($resultado);
    }
}
