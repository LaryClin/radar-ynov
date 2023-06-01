<?php

namespace App\Adaptater;

use DateTime;

interface RadarInterface {
    
    public function getName():string;
    public function getLocalisation():string;
    public function getSpeedLimit():int;
    public function getSpeed():int;
    public function getDate():DateTime;
    public function getEvidence():string;
    public function getLicense():string;
    public function getType():string;
    public function getBrand():string;

}










