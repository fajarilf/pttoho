<?php

namespace fajarilham\app;

class Router 
{
    private static array $routes = [];

    public static function add(
        string $method,
        string $path,
        string $controller,
        string $function,
        array $middlewares = []
    ){
        self::$routes[] = [
            "method" => $method,
            "path" => $path,
            "controller" => $controller,
            "function" => $function,
            "middlewares" => $middlewares
        ];
    }

    public static function run(): void
    {
        $path = "/";
    }
}