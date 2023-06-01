<?php

namespace App\Dto\B612;
use App\Dto\AbstractRadar;
use DateTime;

class B612Dto extends AbstractRadar{

    public function getName():string{
        return $this->infos->name;
    }

    public function getLocalisation():string{
        return $this->infos->localisation;
    }

    public function getSpeed():int{
        $pos = substr_count($this->infos->speed,'km/h');
        $formatSpeed = substr($this->infos->speed,0,$pos);
        return intval($formatSpeed);
    }

    public function getDate():dateTime{
        $time_input = strtotime($this->infos->date); 
        $date_input = date("Y-m-d\TH:i:s\Z", $time_input);    
        return new DateTime($date_input); 
    }

    public function getEvidence():string{
        return $this->infos->evidence;
    }

    public function getLicense():string{
        return $this->infos->license;
    }
}