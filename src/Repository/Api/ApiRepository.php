<?php

namespace App\Repository\Api;

use App\Entity\Radar;
use App\Entity\Report;
use App\Entity\Vehicle;
use App\Repository\OutRepositoryInterface;

class ApiRepository implements OutRepositoryInterface{


    public function findOneRadarBy($params): ?Radar {
        return null;
    }
    public function findOneVehicleBy($params): ?Vehicle {
        return null;
    }

    public function saveRadar(Radar $radar): bool {
        return false;
    }
    public function saveVehicle(Vehicle $vehicle): bool {
        return false;
    }
    public function saveReport(Report $report): bool {
        return false;
    }
    //save vehicle 
}