<?php
namespace App\Controller;

use App\Mapping\Reporter2000Mapping;
use App\UseCase\SaveRadarUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class Reporter2000Controller extends AbstractController {

    /** 
     * @Route("/reporter2000", name="post_reporter2000")
     */
    public function postReporter2000(SaveRadarUseCase $saveRadarUseCase): Response{
        $var = readfile("php://input");
        $xml = simplexml_load_string($var);
        $mapper = new Reporter2000Mapping($xml);
        foreach($mapper->getEntities() as $entities) {
            $saveRadarUseCase->saveRadar($entities);
        }
        return new Response(
            NULL,
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
    }


}