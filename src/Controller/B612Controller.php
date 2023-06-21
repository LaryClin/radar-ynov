<?php

namespace App\Controller;

use App\Mapping\B612Mapping;
use App\UseCase\SaveRadarUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class B612Controller extends AbstractController {

    /**
     * @Route("/postb612", name="postb612")
     */
    public function postB612Controller(SaveRadarUseCase $saveRadarUseCase): Response {

        $input = file_get_contents("php://input");
        if(empty($input))
            return new JsonResponse(['ERROR' => 'DATA_FORMAT_INCORRECT'], Response::HTTP_NO_CONTENT);
        $mapper = new B612Mapping($input);
        foreach($mapper->getEntities() as $VehicleReportRadar){
            $saveRadarUseCase->saveRadar($VehicleReportRadar);
        }
        
        return new Response(
            NULL,
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
    }

}