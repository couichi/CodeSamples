<?php

$err="";
if(empty($_GET['keyword']) || $_GET['keyword']=='type in search keyword')
{
	echo "<h1>you need enter keyword to search codes!!<br>";
	echo "Please go back and fill in the blanks</h1>";
}
else
{
	
	
	include "includes/header.php";

	include "includes/autoload.php";
	
	echo "<body onload=\"prettyPrint()\">";
	
	$db = new PdoSearch();
	$db->connect();
	$db->search($_GET);
	
	
	

	
	
	
	
	
	
}