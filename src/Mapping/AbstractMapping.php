<?php

namespace App\Mapping;

use App\Entity\Radar;
use App\Entity\Report;
use App\Entity\Vehicle;
use DateTime;
use Generator;

abstract class AbstractMapping {

    protected $infos;
    protected $reformatInfos;

    public function __construct($infos)
    {
        $this->infos = $infos;
    }

    protected abstract function getEntities(): Generator;

    protected function getVehicle(): Vehicle{
        $vehicle = new Vehicle();
        $vehicle->setLicense($this->getLicense())
        ->setType($this->getType())
        ->setBrand($this->getBrand());
        return $vehicle;
    }

    protected function getReport(): Report{
        $report = new Report();
        $report->setSpeed($this->getSpeed())
        ->setDate($this->getDate())
        ->setEvidence($this->getEvidence());
        return $report;
    }

    protected function getRadar(): Radar{
        $radar = new Radar();
        $radar->setName($this->getName())
        ->setLocalisation($this->getLocalisation())
        ->setSpeedLimit($this->getSpeedLimit());
        return $radar;
    }

    
    protected function getName(): ?string{
        return NULL;
    }

    protected function getLocalisation(): ?string{
        return NULL;
    }

    protected function getSpeedLimit(): ?int{
        return NULL;
    }

    protected function getSpeed(): ?int{
        return NULL;
    }

    protected function getDate():DateTime{
        return new DateTime();
    }

    protected function getEvidence(): ?string{
        return NULL;
    }

    abstract protected function getLicense(): ?string;
    
    protected function getType(): ?string{
        return NULL;
    }
    
    protected function getBrand(): ?string{
        return NULL;
    }


}