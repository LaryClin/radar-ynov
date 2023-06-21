<?php

namespace App\UseCase;

use App\Repository\OutRepositoryInterface;

class SaveRadarUseCase {

    public function __construct(
        private OutRepositoryInterface $outRepositoryInterface
    )
    {}

    public function saveRadar($VehicleReportRadar) {
        list(
            'vehicle' => $vehicle,
            'report' => $report,
            'radar' =>  $radar
            ) = $VehicleReportRadar;

        if(!$this->outRepositoryInterface->findOneRadarBy(['name' => $radar->getName()]))
            $radar = $this->outRepositoryInterface->saveRadar($radar);

        if(!$this->outRepositoryInterface->findOneVehicleBy(['license' => $vehicle->getLicense()]))
            $vehicle = $this->outRepositoryInterface->saveVehicle($vehicle);

        $report->setRadar($radar);
        $report->setVehicle($vehicle);
        $this->outRepositoryInterface->saveReport($report);
        
    }

}