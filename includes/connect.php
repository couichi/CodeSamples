<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "codesamples";

$con = mysql_connect($host,$user,$password,0,131072);
mysql_select_db("codesamples",$con);


/*
try {
    $pdo = new PDO("mysql:host=$host; dbname=$dbname",$user, $password);
} catch (PDOException $e){
    var_dump($e->getMessage());
}
*/