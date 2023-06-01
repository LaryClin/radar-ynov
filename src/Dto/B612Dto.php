<?php

namespace App\Dto;
use App\Dto\AbstractRadar;
use DateTime;
use stdClass;

class B612Dto extends AbstractRadar{

    // public function __construct($infos)
    // {
    //     parent::__construct($infos);
    // }

    public function __construct($input)
    {
        $this->infos = json_decode($input);
    }

    public function getEntities() {
        foreach($this->infos->reports as $report) {
            $obj = new stdClass;
            $obj->report = $report;
            $obj->name = $this->infos->name;
            $obj->localisation = $this->infos->localisation;
            $adaptater = new B612Dto($obj);
            yield [
                'vehicle' => $adaptater->getVehicle(),
                'radar'   => $adaptater->getRadar(),
                'report'  => $adaptater->getReport(),
            ];
        }
    }

    public function getName():string{
        return $this->infos->name;
    }

    public function getLocalisation():string{
        return $this->infos->localisation;
    }

    public function getSpeed():int{
        $pos = substr_count($this->infos->report->speed,'km/h');
        $formatSpeed = substr($this->infos->report->speed,0,$pos);
        return intval($formatSpeed);
    }

    public function getDate():dateTime{
        $time_input = strtotime($this->infos->report->date); 
        $date_input = date("Y-m-d\TH:i:s\Z", $time_input);    
        return new DateTime($date_input); 
    }

    public function getEvidence():string{
        return $this->infos->report->evidenceUrl;
    }

    public function getLicense():string{
        return $this->infos->report->licensePlate;
    }
}