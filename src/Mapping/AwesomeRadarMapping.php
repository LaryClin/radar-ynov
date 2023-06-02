<?php

namespace App\Mapping;

use App\Mapping\AbstractMapping;
use DateTime;
use Generator;
use stdClass;

class AwesomeRadarMapping extends AbstractMapping
{
    public function __construct($input)
    {
        $this->infos = json_decode($input);
    }

    public function getEntities(): Generator {
        foreach($this->infos->incidents as $incident) {
            $obj = new stdClass;
            $obj->license = $incident[0];
            $obj->date = $incident[1];
            $obj->name = "AwesomeRadar";
            $obj->localisation = $this->infos->metadata->localisation;
            $obj->speedLimit = $this->infos->metadata->speedThreshold;
            $this->reformatInfos = $obj;
            yield [
                'vehicle' => $this->getVehicle(),
                'radar'   => $this->getRadar(),
                'report'  => $this->getReport(),
            ];
        }
    }


    public function getName(): string
    {
        return $this->reformatInfos->name;
    }

    public function getLocalisation(): string
    {
        return $this->reformatInfos->localisation;
    }

    public function getSpeedLimit(): int
    {
        return $this->reformatInfos->speedLimit;
    }

    public function getDate(): DateTime
    {  
        return new DateTime($this->reformatInfos->date); 
    }

    public function getLicense(): string
    {
        return $this->reformatInfos->license;
    }

}