<?php
/*
takes $_POST variables from post_form.php
$_POST['lang'] numeric 
$_POST['tag']; a tag of tags comma separated emp_ok
$_POST['code'];
$_POST['description']; emp_ok
*/
include "includes/autoload.php";
include "includes/print_rp.php";

$emp_ok = array("tag","description");
$validate = new Validation();
$err = $validate->checkBlank($_POST,$emp_ok);

if($err[0]!="")
{
	echo "<h1>";
	foreach($err as $var)
	{
		echo $var."<br>";
	}
	echo "Please go back and fill in the blanks</h1>";
}
else
{
	if($validate->checkLang($_POST['lang'])->checkTag($_POST['tag'])->checkCode($_POST['code'])->checkDescription($_POST['description'])->checkErrors())
	{
		$_POST['date'] = date("Y-m-d H:i:s", time());
		$_POST['lines'] = $validate->getLines($_POST['code']);
		
		if($_POST['tag'] == 'Libraries/Implementations/Softwares')
		{
			$_POST['tag'] = "";
		}
		
		
		//insert code and others
		//get codeid
		//check each tag
		//if tag exist get the tag_id
		//else make newtag and get the new tag_id
		//insert code_tag map record
		
		
		$db = new PdoCodesInsert();
		$db->connect("codesamples");
		$flg = $db->main($_POST);
		
		if($flg)
		{
			$url="success.php";
			$param=array();
			$jump = new Jump($url,$param);
		}
		else
		{
			echo "error!";
		}
		
	}
	else
	{
		echo "Invalid value!";
	}
	
	
}