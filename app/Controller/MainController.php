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
        $this->mqttRespository = new MqttRespository(Database::getConnection());
    }

    public function index() 
    {
        $param = "";

        if(isset($_GET["filter"])){
            $param = $_GET["filter"];
        }

        $data = $this->mqttRespository->getLastData();

        switch ($param) {
            case 'statusa_true':
                $datas = $this->mqttRespository->getAllData(
                    "SELECT * FROM `datas` WHERE status_a = 1 ORDER BY id DESC LIMIT 6"
                );
                break;
            case 'statusa_false':
                $datas = $this->mqttRespository->getAllData(
                    "SELECT * FROM `datas` WHERE status_a = 0 ORDER BY id DESC LIMIT 6"
                );
                break;
            case 'statusb_true':
                $datas = $this->mqttRespository->getAllData(
                    "SELECT * FROM `datas` WHERE status_b = 1 ORDER BY id DESC LIMIT 6"
                );
                break;
            case 'statusb_false':
                $datas = $this->mqttRespository->getAllData(
                    "SELECT * FROM `datas` WHERE status_b = 0 ORDER BY id DESC LIMIT 6"
                );
                break;
            
            default:
                $datas = $this->mqttRespository->getAllData(
                    "SELECT * FROM `datas` ORDER BY id DESC LIMIT 6"
                );
                break;
        }

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

        if(isset($_GET["filter"])){
            $param = $_GET["filter"];
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
            case 'statusa_true':
                $datas = $this->mqttRespository->getAllData(
                    "SELECT * FROM datas WHERE status_a = 1"
                );
                break;
            case 'statusa_false':
                $datas = $this->mqttRespository->getAllData(
                    "SELECT * FROM datas WHERE status_a = 0"
                );
                break;
            case 'statusb_true':
                $datas = $this->mqttRespository->getAllData(
                    "SELECT * FROM datas WHERE status_b = 1"
                );
                break;
            case 'statusb_false':
                $datas = $this->mqttRespository->getAllData(
                    "SELECT * FROM datas WHERE status_b = 0"
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

    public function getData()
    {
        $data = $this->mqttRespository->getLastData();

        $array = [
            "humidity" => $data->humidity,
            "temperature" => $data->temperature,
            "status_a" => $data->status_a,
            "status_b" => $data->status_b,
        ];

        echo json_encode($array);
    }

    public function downloadData()
    {
        $datas = $this->mqttRespository->getAllData(
            "SELECT * FROM datas"
        );

        View::donwload("Download/table", [
            "title" => "Dashboard",
            "datas" => [
                "humidity" => $datas->humidity, 
                "temperature" => $datas->temperature, 
                "status_a" => $datas->status_a, 
                "status_b" => $datas->status_b, 
                "date_time" => $datas->date_time,
            ],
        ], "data dummy");
    }
}