<?php 
	

function __autoload($class_name){
	$class_name=strtolower($class_name);
	$pass = 'classes/class.'.$class_name.'.php';
	if(file_exists($pass))
	{
		include 'classes/class.'.$class_name.'.php';
	}
	else
	{
		echo "Class file does not exist. $pass<br>";
	}
}


