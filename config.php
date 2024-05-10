<?php
$host = 'localhost';
$port = 3306;
$username = 'root';
$password = 'admin';
$database = 'foodman';

$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

/*
-----------------------------*****README!!*****-------------------------------
To connect the database correctly make sure you done the following steps

first thing is to configration SQL database 

step one :
download and install MySQL on you own machine
step two :
config the DB password to admnin
step three :
set DB port to 3306
step four :
create a schema named foodman using the following sql command

CREATE SCHEMA 'Foodman'; //Not sure about the command

the you need to use a web server software like XAMPP or WAMPP or you can use PHP serve 
*/