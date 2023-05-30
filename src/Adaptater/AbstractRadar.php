<?php

namespace App\Adaptater;

abstract class AbstractRadar implements RadarInterface{

    public function getVehicle(){
        $vehicle = new Vehicle();
        $vehicle->setLicense($this->getLicense())
        ->setType($this->getType())
        ->setBrand($this->getBrand());
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