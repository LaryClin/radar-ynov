<?php

namespace App\Controller;

use App\Dto\B612Dto;
use App\Repository\RadarRepository;
use App\Repository\VehicleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class B612Controller extends AbstractController {

    /**
     * @Route("/postb612", name="postb612")
     */
    public function postB612Controller(
        RadarRepository $radarRepository,
        VehicleRepository $vehicleRepository,
        EntityManagerInterface $em
    ): Response {
        $input = file_get_contents("php://input");
        $controller = new RadarController(
            new B612Dto($input)
        );
        
        return new Response();
    }

}