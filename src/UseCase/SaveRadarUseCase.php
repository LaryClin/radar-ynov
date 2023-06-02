<?php

use App\Repository\OutRepositoryInterface;
use Doctrine\ORM\EntityManager;

class saveRadarUseCase {

    public function __construct(
        private OutRepositoryInterface $outRepositoryInterface,
        private EntityManager $em,
        $VehicleReportRadar
    )
    {}

    public function saveRadar($VehicleReportRadar) {
        // $entity = [
        //     "vehicle" => Vehicle::class,
        //     "report" => Report::class,
        //     "radar" => Radar::class,
        // ]

        list(
            'vehicle' => $vehicle,
            'report' => $report,
            'radar' =>  $radar
            ) = $VehicleReportRadar;

        $radarRepository = $this->outRepositoryInterface->getRadarRepository();
        $vehicleRepository = $this->outRepositoryInterface->getVehicleRepository();


        if(!$radarRepository->findOneBy(['name' => $radar->getName()]))
            $radar = $radarRepository->persist($radar);

        if(!$vehicleRepository->findOneBy(['license' => $vehicle->getLicense()]))
            $vehicle = $vehicleRepository->persist($vehicle);

        $report->setRadar($radar);
        $report->setVehicle($vehicle);
        $em->persist($report);
        
        $em->flush();
    }

}