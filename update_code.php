<?php

/*
takes posted values from code.php
$_POST['codeid'];
$_POST['code'];
$_POST['description'];
$_POST['tag'];
$_POST['tagids'];
validate them
if they were updated update


echo "
<pre>
$_POST[codeid]<br>";
echo htmlentities($_POST[code],ENT_QUOTES);
echo "<pre>
$_POST[description]
$_POST[tag]
$_POST[tagids]
</pre>";
*/
session_start();
//var_dump($_SESSION);

include "includes/autoload.php";

$emp_ok = array('tag','tagids');
$validate = new Validation();
$err = $validate->checkBlank($_POST,$emp_ok);

if($err[0]!="")
{
	
	foreach($err as $val)
	{
		echo "<h1>$val</h1>";
	}
	
	echo "Plese go back and fill in the blanks";
}
else
{
	$validate->checkCode($_POST['code'])->checkDescription($_POST['description']);
	$_POST['linenum'] = $validate->getLines($_POST['code']);
	$_POST['code'] = htmlspecialchars($_POST['code'],ENT_QUOTES);
	$_POST['description'] = htmlspecialchars($_POST['description'],ENT_QUOTES);
	
	$db = new PdoUpdateCode();
	$db->connect();
	$res = array();
	
	if($_SESSION['code']!=$_POST['code'] || $_SESSION['description']!=$_POST['description'])
	{
		//update codes
		$res['code'] = $db->updateCode($_POST);
	}
	else
	{
		$res['code'] = 1;
	}

	if($_SESSION['tags']!=$_POST['tag'])
	{
		//update tags
		
		$res['tag'] = $db->updateTags($_POST['tag']);
	}
	else
	{
	//no update
		$res['tag'] = 1;
	}


if(array_sum($res)!=2)
{
	//error
	print_r($res);
	echo "error";
}
else
{
	//echo "success";
	$jump = new Jump();
}

}