<?php

namespace fajarilham\App;

class View 
{
    public static function render(string $view, mixed $model)
    {
        require_once __DIR__ . "/../View/header.php";
        require_once __DIR__ . "/../View/" . $view . ".php";
    }

    public static function donwload(string $view, mixed $model, string $filename)
    {
        header("Content-Type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename =" . $filename . ".xls");

        require_once __DIR__ . "/../View/" . $view . ".php";
    }
}