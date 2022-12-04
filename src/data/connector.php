<?php

function create_database_connection()
{
    $jsonConfigRaw = file_get_contents(SRC_PATH . "mariadb-config.json");
    $jsonData = json_decode($jsonConfigRaw, true);
    $servername = $jsonData["servername"];
    $username = $jsonData["username"];
    $password = $jsonData["password"];
    $database = $jsonData["database"];

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        return null;
    }


    return $conn;
}
