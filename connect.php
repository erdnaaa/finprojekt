<?php 
$dbhost = 'localhost';
$dbuser = 'root';
$dbpassw = '';
$dbname = 'final_project';

$mysqli = new mysqli($dbhost, $dbuser, $dbpassw, $dbname);

if($mysqli -> connect_error){
    die("connection failed: " . $mysqli->connect_error);
}
?>