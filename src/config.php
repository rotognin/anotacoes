<?php

include_once 'db.php';

define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => $db_host ?? "localhost",
    "port" => "3306",
    "dbname" => "anotacoes_db",
    "username" => $db_user ?? "root",
    "passwd" => $db_pass ?? "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);