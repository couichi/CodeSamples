<?php
	
ob_start();

if(!is_numeric($_GET['id']) && !is_numeric($_GET['ld']))
{
	echo "<h1>Invalid value!</h1>";
}
else
{
	include "includes/header.php";
	include "includes/vars.php";
	include "includes/autoload.php";
	$langid = $_GET['ld'];
	
	echo "<body onload=\"prettyPrint()\">";
	
	$id=$_GET['id'];
	$sql = "select * from codes where id=$id";
	$db = new PdoUpdateCode();
	$db->connect();
	$db->squery($sql);
	//echo $_SESSION['tags'];
	ob_end_flush();
	/*
	$res = $db->squery($sql);
	
	
	
	foreach($res as $row)
	{
		echo "<div class=code>";
		echo "<h3><a href='code.php?id=".$row['id']."'>".$row['id']."</a> ";
		echo $row['modified']."</h3><br>";
		echo "<pre class='brush: ".$langs[$row['lang_id']][1]."'>\n";
		echo $row['code'];
		echo "</pre>";
		
		echo "<div class=description>";
		echo $row['description'];
		echo "</div>";
		echo "</div>";
	}
	*/
}