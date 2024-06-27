<?php

namespace fajarilham\Controller;
use fajarilham\App\View;
use fajarilham\Config\Database;
use fajarilham\Config\Mqtt;
use fajarilham\Repository\MqttRespository;

class MqttController 
{
    private MqttRespository $mqttRespository;

    public function __construct()
    {
        $this->mqttRespository = new MqttRespository(Database::getConnection());
    }

    // public function run()
    // {
    //     $this->mqttRespository->save();
    // }
}