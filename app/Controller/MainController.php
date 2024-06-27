<?php

namespace fajarilham\Controller;

use fajarilham\App\View;
use fajarilham\Repository\MqttRespository;
use fajarilham\Config\Database;
use fajarilham\Config\Mqtt;

class MainController
{
    private MqttRespository $mqttRespository;

    public function __construct()
    {
        $this->mqttRespository = new MqttRespository(Database::getConnection(), Mqtt::getConnection());
    }

    public function index() 
    {
        $data = $this->mqttRespository->getLastData();

        $datas = $this->mqttRespository->getAllData(
            "SELECT * FROM datas ORDER BY id ASC LIMIT 6"
        );

        View::render("index", [
            "title" => "Dashboard",
            "humidity" => $data->humidity,
            "temperature" => $data->temperature,
            "status" => [
                "a" => $data->status_a,
                "b" => $data->status_b,
            ],
            "datas" => [
                "humidity" => $datas->humidity, 
                "temperature" => $datas->temperature, 
                "status_a" => $datas->status_a, 
                "status_b" => $datas->status_b, 
                "date_time" => $datas->date_time,
            ],
        ]);
    }

    public function table()
    {
        $param = "";

        if(isset($_GET["sort"])){
            $param = $_GET["sort"];
        }

        switch ($param) {
            case 'statusa':
                $datas = $this->mqttRespository->getAllData(
                    "SELECT * FROM datas ORDER BY status_a ASC"
                );
                break;
            case 'statusb':
                $datas = $this->mqttRespository->getAllData(
                    "SELECT * FROM datas ORDER BY status_b ASC"
                );
                break;
            default:
                $datas = $this->mqttRespository->getAllData(
                    "SELECT * FROM datas"
                );
                break;
        }

        View::render("table", [
            "title" => "Dashboard",
            "datas" => [
                "humidity" => $datas->humidity, 
                "temperature" => $datas->temperature, 
                "status_a" => $datas->status_a, 
                "status_b" => $datas->status_b, 
                "date_time" => $datas->date_time,
            ],
        ]);
    }
}