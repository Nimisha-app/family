<?php
session_start();
$localhost = 'localhost';
$DBNAME = 'microsoft';
$USERNAME = 'root';
$PASSWORD = '';
$DBPORT='3306';

$db=mysqli_connect($localhost,$USERNAME,$PASSWORD,$DBNAME);
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>