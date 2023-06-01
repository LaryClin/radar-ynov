<?php

namespace App\Dto\AwesomeRadar;

use App\Dto\AbstractRadar;
use DateTime;

class AwesomeRadarDto extends AbstractRadar
{
    public function construct($infos){
        $this->infos = json_decode($infos);
    }


    public function getName(): string
    {
        return "AwesomeRadarAdaptater";
    }

    public function getLocalisation(): string
    {
        return $this->infos->metadata->localisation;
    }

    public function getSpeedLimit(): int
    {
        return $this->infos->metadata->speedThreshold;
    }

    public function getSpeed(): int
    {
        return 0;
    }

    public function getDate(): DateTime
    {
        try {
            return new DateTime($this->infos->incidents[$this->index][1]);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getEvidence(): string
    {
        return "";
    }

    public function getLicense(): string
    {
        return $this->infos->incidents[$this->index][0];
    }

    public function getType(): string
    {
        return "";
    }

    public function getBrand(): string
    {
        return "";
    }

}