<?php

namespace fajarilham\repository;

use fajarilham\Domain\Data;
use PDO;

class MqttRespository 
{
    public function __construct(private PDO $connection){}
    
    public function save(Data $data): Data
    {
        $sql = "INSERT INTO datas(humidity, temperature, status_a, status_b, waktu) 
                VALUES(:humidity, :temperature, :status_a, :status_b, :waktu)"
        ;

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            "humidity" => $data->humidity,
            "temperature" => $data->temperature,
            "status_a" => $data->status_a,
            "status_b" => $data->status_b,
            "waktu" => $data->waktu
        ]);

        return $data;
    }
}