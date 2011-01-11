<?php
	
/*
takes $_POST variables from post_tags.php
$_POST['lang'] numeric
$_POST['newtag']; a tag of tags comma separated

*/
include "includes/autoload.php";
//include "includes/header.php";

$validate = new Validation();
$err = $validate->checkBlank($_POST,"");

if($err[0]=="")
{
	if($validate->checkLang($_POST['lang'])->checkTag($_POST['newtag'])->checkErrors())
	{
		//insert_tags
		$tags = explode(",",$_POST['newtag']);
		$db = new InsertSpec();
		
		foreach($tags as $var)
		{
			$var = strtolower($var);
			$db->insertSpecs($var,$_POST['lang']);
		}
		
		$url="success.php";
		$param=array();
		$jump = new Jump($url,$param);
		
	}
	else
	{
		$err[]="Invaliid value!";
		$display = new Display();
		$display->error($err);
	}
	
}
else
{

$display = new Display();
$display->error($err);
}