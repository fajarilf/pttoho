<?php

namespace fajarilham\App;

class View 
{
    public static function render(string $view, mixed $model)
    {
        require_once __DIR__ . "/../View/header.php";
        require_once __DIR__ . "/../View/" . $view . ".php";
    }
}