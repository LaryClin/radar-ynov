<?php

namespace App\AbstractMapping;

use App\Mapping\AbstractMapping;
use DateTime;
use Generator;
use stdClass;

class B612Mapping extends AbstractMapping {

    // public function __construct($infos)
    // {
    //     parent::__construct($infos);
    // }

    public function __construct($input)
    {
        $this->infos = json_decode($input);
    }

    public function getEntities(): Generator {
        foreach($this->infos->reports as $report) {
            $obj               = new stdClass;
            $obj->report       = $report;
            $obj->name         = $this->infos->name;
            $obj->localisation = $this->infos->localisation;
            $this->reformatInfos = $obj;
            yield [
                'vehicle' => $this->getVehicle(),
                'radar'   => $this->getRadar(),
                'report'  => $this->getReport(),
            ];
        }
    }

    public function getName():string{
        return $this->reformatInfos->name;
    }

    public function getLocalisation(): string{
        return $this->reformatInfos->localisation;
    }

    public function getSpeed():int{
        $pos = substr_count($this->reformatInfos->report->speed,'km/h');
        $formatSpeed = substr($this->reformatInfos->report->speed,0,$pos);
        return intval($formatSpeed);
    }

    public function getDate():dateTime{
        $time_input = strtotime($this->reformatInfos->report->date); 
        $date_input = date("Y-m-d\TH:i:s\Z", $time_input);    
        return new DateTime($date_input); 
    }

    public function getEvidence():string{
        return $this->reformatInfos->report->evidenceUrl;
    }

    public function getLicense():string{
        return $this->reformatInfos->report->licensePlate;
    }


}