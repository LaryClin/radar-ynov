<?php

namespace App\Repository\Database;

use App\Entity\Radar;
use App\Entity\Report;
use App\Entity\Vehicle;
use App\Repository\OutRepositoryInterface;
use App\Repository\Database\DatabaseRadarRepository;
use App\Repository\Database\DatabaseVehicleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Exception;

class DatabaseRepository implements OutRepositoryInterface {
    
    private $managerRegistry;
    private $em;

    public function __construct(ManagerRegistry $managerRegistry, EntityManagerInterface $em)
    {
        $this->managerRegistry = $managerRegistry;
        $this->em = $em;
    }

    public function findOneRadarBy($params): ?Radar {
        $radarRepository = new DatabaseRadarRepository($this->managerRegistry);
        return $radarRepository->findOneBy($params);
    }

    public function findOneVehicleBy($params): ?Vehicle {
        $vehicleRepository = new DatabaseVehicleRepository($this->managerRegistry);
        return $vehicleRepository->findOneBy($params);
    }

    public function saveRadar(Radar $radar): bool {
        try {
            $this->em->persist($radar);
            return true;
        }catch(Exception $e) {
            return false;
        }
    }

    public function saveVehicle(Vehicle $vehicle): bool {
        try {
            $this->em->persist($vehicle);
            return true;
        }catch(Exception $e) {
            return false;
        }
    }

    public function saveReport(Report $report): bool {
        try {
            $this->em->persist($report);
            return true;
        }catch(Exception $e) {
            return false;
        }
    }

}