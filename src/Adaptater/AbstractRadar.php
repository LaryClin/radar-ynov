<?php

namespace App\Adaptater;
use App\Entity\Radar;
use App\Entity\Report;
use App\Entity\Vehicle;
use DateTime;

abstract class AbstractRadar implements RadarInterface{

    protected $infos;

    public function getVehicle(){
        $vehicle = new Vehicle();
        $vehicle->setLicense($this->getLicense())
        ->setType($this->getType())
        ->setBrand($this->getBrand());
    }

    public function getReport(){
        $report = new Report();
        $report->setSpeed($this->getSpeed())
        ->setDate($this->getDate())
        ->setEvidence($this->getEvidence());
    }

    public function getRadar(){
        $radar = new Radar();
        $radar->setName($this->getName())
        ->setLocalisation($this->getLocalisation())
        ->setSpeedLimit($this->getSpeedLimit());
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