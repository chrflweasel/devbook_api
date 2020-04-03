<?php

function getPDO(){
    $paramsFile = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'db_settings.json', false);
    $connParams = json_decode($paramsFile, true);

    $host = $connParams['main_db']['host'];
    $db = $connParams['main_db']['db'];
    $username = $connParams['main_db']['username'];
    $password = $connParams['main_db']['password'];

    try {
        return new PDO("mysql:host=$host;dbname=$db;charset=utf8", $username, $password);
    } catch (PDOException $e) {
        echo $e->getMessage();
        return null;
    }
}