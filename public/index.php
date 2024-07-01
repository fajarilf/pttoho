<?php
use fajarilham\Controller\MqttController;

require_once __DIR__ . "/../vendor/autoload.php";

$mqtt = new MqttController();

$mqtt->run();