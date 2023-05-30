<?php

namespace App\Adaptater;

interface RadarInterface {
    
    public function getName():string;
    public function getLocalisation():string;
    public function getSpeedLimit():integer;
    public function getSpeed():integer;
    public function getDate():dateTime;
    public function getEvidence():string;
    public function getLicense():string;
    public function getType():string;
    public function getBrand():string;

}










