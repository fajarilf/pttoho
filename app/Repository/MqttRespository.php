<?php

namespace fajarilham\Repository;

use PDO;
use PhpMqtt\Client\MqttClient;

class MqttRespository 
{
    public function __construct(private PDO $connection, private MqttClient $client){}
    
    public function save()
    {
        $this->client->subscribe("tohotechnology", function($topic, $message){
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
    }

    public function loop()
    {
        $this->client->loop();
    }
}