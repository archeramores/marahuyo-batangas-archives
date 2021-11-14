<?php

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="login_dashboard";

if(!$con= mysqli_connect($dbhost,$dbuser, $dbpass, $dbname))
{
    die("Failed to connect to server!");
}