<?php
	

include "includes/vars.php";
include "includes/header.php";
include "includes/autoload.php";

echo "<body onload=\"prettyPrint()\">";

if(0>$_GET['lang'] || $_GET['lang']>53)
{
	echo "<h1>Invalid value!</h1>";
}
else
{
	$langid=$_GET['lang'];
	$sql="select * from codes where lang_id=$langid order by linenum";
	
	$db = new PdoSearch();
	$db->connect();
	$db->setLangid($langid);
	$db->squery($sql);
}


