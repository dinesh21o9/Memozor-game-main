<?php

$host = "baovfaa6xbpufd0utrz0-mysql.services.clever-cloud.com";
$dbname = "baovfaa6xbpufd0utrz0";
$username = "ugslixir4pioyxuk";
$password = "ugslixir4pioyxuk";
$port = "3306";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname,
                     port: $port);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;