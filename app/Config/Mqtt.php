<?php

namespace fajarilham\Config;

use PhpMqtt\Client\ConnectionSettings;
use PhpMqtt\Client\MqttClient;

class Mqtt 
{
    private static MqttClient $client;

    public static function getConnection(string $env = "test"): MqttClient
    {
        require_once __DIR__ . "/../../config/mqtt.php";

        $config = getMqttInfo();

        $connectionSettings = (new ConnectionSettings)
            ->setUsername($config["mqtt"][$env]["username"])
            ->setPassword($config["mqtt"][$env]["password"])
            ->setKeepAliveInterval(60)
            ->setLastWillMessage("client disconnect")
            ->setLastWillQualityOfService(2)
        ;

        self::$client = new MqttClient(
            host: $config["mqtt"][$env]["server"],
            port: $config["mqtt"][$env]["port"],
            clientId: $config["mqtt"][$env]["clientId"],
        );

        self::$client->connect($connectionSettings);

        echo "client connect" . PHP_EOL;

        return self::$client;
    }
}