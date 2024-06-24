<?php
use fajarilham\Config\Database;
use fajarilham\Config\Mqtt;
use fajarilham\Domain\Data;
use fajarilham\repository\MqttRespository;

require_once __DIR__ . "/../vendor/autoload.php";

$client = Mqtt::getConnection();

$client->subscribe("/data_dummy", function($topic, $message){
    $newArray = json_decode($message, true);

    var_dump($newArray);

    $db = Database::getConnection();
    $statement = $db->prepare("INSERT INTO datas(humidity, temperature, status_a, status_b, waktu) 
                VALUES(:humidity, :temperature, :status_a, :status_b, :waktu)")
    ;

    $statement->execute([
        "humidity" => $newArray["humidity"],
        "temperature" =>  $newArray["temperature"],
        "status_a" => (int)$newArray["status_a"],
        "status_b" => (int)$newArray["status_b"],
        "waktu" => 1
    ]);

}, 0);

$client->loop();