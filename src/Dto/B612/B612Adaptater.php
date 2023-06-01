<?php

namespace App\Dto\B612;
use App\Dto\AbstractRadar;

class B612Adaptater extends AbstractRadar{

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