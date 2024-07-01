<?php

function getMqttInfo(): array
{
    return [
        "mqtt" => [
            "test" => [
                "server" => "broker.emqx.io",
                "port" => "1883",
                "clientId" => "mqqt_test",
                "username" => "emqx_user",
                "password" => "public",
            ],
            "prod" => [
                "server" => "broker.emqx.io",
                "port" => "1883",
                "clientId" => "mqqt_test",
                "username" => "emqx_user",
                "password" => "public",
            ]
        ]
    ];
}