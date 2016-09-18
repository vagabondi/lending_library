<?php

require_once 'config/config.php';

$dbConn=new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$dbConn->set_charset("utf8");

if ($dbConn->connect_error) {
    die("Polaczenie nieudane. Blad: " . $dbConn->connect_error);
}
