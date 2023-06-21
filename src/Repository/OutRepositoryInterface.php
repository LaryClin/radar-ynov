<?php

namespace App\Repository;

use App\Entity\Radar;
use App\Entity\Report;
use App\Entity\Vehicle;

interface OutRepositoryInterface {
    
    public function findOneRadarBy($params): ?Radar;
    public function findOneVehicleBy($params): ?Vehicle;

    public function saveRadar(Radar $radar): bool;
    public function saveVehicle(Vehicle $vehicle): bool;
    public function saveReport(Report $report): bool;
}