<?php

namespace fajarilham\app;

class View 
{
    public static function render(string $view, mixed $model)
    {
        require_once __DIR__ . "/../View/template.html";
    }
}