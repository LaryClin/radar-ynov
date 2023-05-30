<?php

namespace App\Adaptater;
use App\Entity\Radar;
use App\Entity\Report;
use App\Entity\Vehicle;

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

    public function getName():string{}
    public function getLocalisation():string{}
    public function getSpeedLimit():integer{}
    public function getSpeed():integer{}
    public function getDate():dateTime{}
    public function getEvidence():string{}
    public function getLicense():string{}
    public function getType():string{}
    public function getBrand():string{}


}