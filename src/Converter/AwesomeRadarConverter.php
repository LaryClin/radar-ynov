<?php


namespace App\Converter;
use App\Dto\AwesomeRadarDto;
use App\Entity\Radar;


class AwesomeRadarConverter
{
    public function fromJsonToEntities($json): Radar
    {

        $dto = new AwesomeRadarDto($json);

        foreach ($data->incidents as $index => $incident) {
            $adapter->setIndex($index);

            $license = $adapter->getVehicle();
            $date = $adapter->getDate();
        }
    }

    public function fromJsonToEntity($json): Radar
    {

        $adapter = new AwesomeRadarAdapter();
        $adapter->setInfos(json_decode($data));

        foreach ($data->incidents as $index => $incident) {
            $adapter->setIndex($index);

            $license = $adapter->getVehicle();
            $date = $adapter->getDate();
        }
    }
}