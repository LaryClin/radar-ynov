<?php

namespace App\Controller;

use App\AbstractMapping\B612Mapping;
use App\Dto\B612Dto;
use App\Repository\RadarRepository;
use App\Repository\VehicleRepository;
use Doctrine\ORM\EntityManagerInterface;
use saveRadarUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class B612Controller extends AbstractController {

    /**
     * @Route("/postb612", name="postb612")
     */
    public function postB612Controller(): Response {

        $input = file_get_contents("php://input");

        $mapper = new B612Mapping($input);
        foreach($mapper->getEntities() as $VehicleReportRadar){
            
            $saveRadarUseCase = new saveRadarUseCase($VehicleReportRadar); 
            $saveRadarUseCase->saveRadar();
        }
        
        return new Response();
    }

}