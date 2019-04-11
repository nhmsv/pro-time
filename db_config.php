




<?php

//STEP 1: DEFINE VARIABLES
$host = 'localhost';
$user = 'root';
$pwd = 'root';
$db = 'time_management';

//STEP 2: CONNECT TO THE DB
$con = mysqli_connect($host,$user,$pwd,$db);

$bdd = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);


?>

