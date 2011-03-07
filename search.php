<?php

$err="";
if(empty($_GET['keyword']) || $_GET['keyword']=='type in search keyword')
{

  if(empty($_GET['lang']) && $_GET['tag']=='Libraries/Implementations/Softwares')
    {

      echo "<h1>you need to enter a keyword to search codes!!<br>";
      echo "Please go back and fill in the blanks</h1>";


    }
  else
    {
      header("location:search_all.php?lang=".$_GET['lang']);
    }

  

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