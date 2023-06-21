<?php

namespace App\Repository;

use App\Repository\Api\ApiRepository;
use App\Repository\Database\DatabaseRepository;
use App\Repository\OutRepositoryInterface;

class RepositoryFactory {
    
    public static function createRadarRepository(
        $outMode, 
        DatabaseRepository $databaseRepository,
        ApiRepository $apiRepository,
        ): OutRepositoryInterface {
        if($outMode == 'DATABASE')
            return $databaseRepository;
        return $apiRepository;
    }
}