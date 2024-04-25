<?php

function getDatabaseConfig(): array
{
    return [
        "database" => [
            "test" => [
                "url" => "mysql:host=localhost:3306;dbname=belajar_php_mvc_login_management;",
                "username" => "root",
                "password" => ""
            ],
            "prod" => [
                "url" => "mysql:host=localhost:3306;dbname=belajar_php_mvc_login_management",
                "username" => "root",
                "password" => ""
            ]
        ]
    ];
}
