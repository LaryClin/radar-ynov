<?php
namespace App\Controller;

use App\Adapter\AwesomeRadar\AwesomeRadarAdapter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AwesomeRadarController extends AbstractController
{
    /**
     * @Route("/radar", name="radar")
     */
    public function fromJsonToEntities(): Response{

    }
}