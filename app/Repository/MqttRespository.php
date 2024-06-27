<?php

namespace fajarilham\Repository;

use fajarilham\Config\Database;
use fajarilham\Config\Mqtt;
use fajarilham\Domain\Data;
use fajarilham\Domain\Datas;
use PDO;
use PhpMqtt\Client\MqttClient;

class MqttRespository 
{
    public function __construct(private PDO $connection, private MqttClient $client){}
    
    public function save()
    {
        $this->client->subscribe("/data_dummy", function($topic, $message){
            $newArray = json_decode($message, true);

            var_dump($newArray);

            $sql = "INSERT INTO datas(humidity, temperature, status_a, status_b) 
                    VALUES(:humidity, :temperature, :status_a, :status_b)"
            ;
            
            $statement = $this->connection->prepare($sql);

            $statement->execute([
                "humidity" => $newArray["humidity"],
                "temperature" =>  $newArray["temperature"],
                "status_a" => (int)$newArray["status_a"],
                "status_b" => (int)$newArray["status_b"],
            ]);

        }, 0);

        $this->client->loop();
        $this->client->disconnect();
    }

    public function loop()
    {
        $this->client->loop();
    }

    public function getLastData(): ?Data
    {
        $sql = "SELECT * FROM `datas` ORDER BY id DESC LIMIT 1";

        $statement = $this->connection->prepare($sql);

        $statement->execute();

        try{
            $row = $statement->fetch();

            if($row == false){
                return null;
            }

            $data = new Data();

            $data->humidity = $row["humidity"];
            $data->temperature = $row["temperature"];
            $data->status_a = $row["status_a"];
            $data->status_b = $row["status_b"];
            $data->date_time = $row["date_time"];

            return $data;
        }finally {
            $statement->closeCursor();
        }
    }

    public function getAllData(string $sql): ?Datas
    {
        // $sql = "SELECT * FROM datas";
        // $sql = "SELECT * FROM `datas` ORDER BY id";

        $statement = $this->connection->prepare($sql);

        $statement->execute();

        try {
            $row = $statement->fetchAll();

            if($row == false){
                return null;
            }

            $datas = new Datas();

            foreach ($row as $val) {
                $datas->humidity[] = $val["humidity"];
                $datas->temperature[] = $val["temperature"];
                $datas->status_a[] = $val["status_a"];
                $datas->status_b[] = $val["status_b"];
                $datas->date_time[] = $val["date_time"];
            }

            return $datas;

        } finally {
            $statement->closeCursor();
        }
    }
}