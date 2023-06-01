<?php

namespace App\Dto;

use App\Entity\Radar;
use App\Entity\Report;
use App\Entity\Vehicle;
use DateTime;
use stdClass;

abstract class AbstractRadar implements RadarInterface{

    protected $infos;

    public function __construct(stdClass $infos)
    {
        $this->infos = $infos;
    }

    public function getVehicle(): Vehicle{
        $vehicle = new Vehicle();
        $vehicle->setLicense($this->getLicense())
        ->setType($this->getType())
        ->setBrand($this->getBrand());
        return $vehicle;
    }

    public function getReport(): Report{
        $report = new Report();
        $report->setSpeed($this->getSpeed())
        ->setDate($this->getDate())
        ->setEvidence($this->getEvidence());
        return $report;
    }

    public function getRadar(): Radar{
        $radar = new Radar();
        $radar->setName($this->getName())
        ->setLocalisation($this->getLocalisation())
        ->setSpeedLimit($this->getSpeedLimit());
        return $radar;
    }

    public function persistEntities($adaptater) {
        $em = $this->getDoctrine()->getManager();

        foreach($adaptater->getEntities() as $entity) {
            // $entity = [
            //     "vehicle" => Vehicle::class,
            //     "report" => Report::class,
            //     "radar" => Radar::class,
            // ]
            list(
                'vehicle' => $vehicle,
                'report' => $report,
                'radar' =>  $radar
                ) = $entity;

            if(!$radarRepository->findOneBy(['name' => $radar->getName()]))
                $radar = $em->persist($radar);

            if(!$vehicleRepository->findOneBy(['license' => $vehicle->getLicense()]))
                $vehicle = $em->persist($vehicle);

            $report->setRadar($radar);
            $report->setVehicle($vehicle);
            $em->persist($report);
            
            $em->flush();
        }
    }

    public function getName():string{
        return '';
    }

    public function getLocalisation():string{
        return '';
    }

    public function getSpeedLimit(): int{
        return 0;
    }

    public function getSpeed(): int{
        return 0;
    }

    public function getDate():DateTime{
        return new DateTime();
    }

    public function getEvidence():string{
        return '';
    }

    public function getLicense():string{
        return '';
    }
    
    public function getType():string{
        return '';
    }
    
    public function getBrand():string{
        return '';
    }


}