<?php

require_once __DIR__ . "/../vendor/autoload.php";

use fajarilham\App\Router;
use fajarilham\Controller\MainController;

Router::add("GET", "/", MainController::class, "index");
Router::add("GET", "/data", MainController::class, "getData");
// Router::add("GET", "/table", MainController::class, "table");
Router::add("GET", "/table/download", MainController::class, "downloadData");

Router::run();