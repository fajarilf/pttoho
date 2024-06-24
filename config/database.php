<?php

function getDatabaseInfo(): array
{
    return [
        "database" => [
            "test" => [
                "url" => "mysql:host=localhost:3306;dbname=mqqt_data_test",
                "username" => "root",
                "password" => "",
            ],
            "prod" => [
                "url" => "mysql:host=localhost:3306;dbname=mqtt_data",
                "username" => "root",
                "password" => "",
            ]
        ]
    ];
}