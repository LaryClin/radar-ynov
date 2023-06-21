<?php

namespace App\Controller;

use App\Repository\ReportRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

// #[Route('/api')]
class RadarController extends AbstractController {

    #[Route('/radar', name: 'route')]
    public function getReportByDate() {
        // $input = readfile("php://input");
        // $date = new DateTime($input);
        // $reports = $reportRepo->findBy(['date'=> $date]);
        return new JsonResponse(null);
    }

}