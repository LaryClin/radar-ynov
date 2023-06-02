<?php

namespace App\Mapping;

use DateTime;
use Generator;
use stdClass;

class Reporter2000Mapping extends AbstractMapping {

    
    public function getEntities(): Generator {
        foreach($this->infos->date->driver as $driver) {
            $obj               = new stdClass;
            $obj->driver       = $driver;
            $obj->localisation = $this->infos['loc'];
            $obj->date         = $this->infos->date['day'];
            $this->reformatInfos = $obj;
            yield [
                'vehicle' => $this->getVehicle(),
                'radar'   => $this->getRadar(),
                'report'  => $this->getReport(),
            ];
        }
    }

    public function getLicense(): ?string {
        return $this->reformatInfos->driver['license'];
    }

    protected function getLocalisation(): ?string{
        return $this->reformatInfos->localisation;
    }

    protected function getSpeed(): ?int{
        return $this->reformatInfos->driver['speed'];
    }

    protected function getDate():DateTime{
        return new DateTime($this->reformatInfos->date);
    }

    protected function getType(): ?string{
        return $this->reformatInfos->driver['type'];
    }
    
    protected function getBrand(): ?string{
        return $this->reformatInfos->driver['brand'];
    }

}