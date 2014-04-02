<?php

ini_set('display_errors','On');
 error_reporting(E_ALL);

define("HOST", "mydb21.surftown.se"); // The host you want to connect to.
define("USER", "Nisha_car"); // The database username.
define("PASSWORD", "car123"); // The database password. 
define("DATABASE", "Nisha_car"); // The database name.
 
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

?>