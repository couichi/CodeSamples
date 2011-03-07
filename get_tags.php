<?php
//This script is for a tag suggestion feature.
//"includes/my.js" calls this page to get tags which related the selected language.


function getSpecs($lang_id)
{
  $db = new SelectTags();
  $sql = sprintf("select speciality from specialities inner join lang_specs where id=sp_id and lang_id=%s",$lang_id);
  $db->squery($sql)->display();
}
	
include "includes/autoload.php";


if(isset($_POST['Lang']))
{
	$lang_id=$_POST['Lang'];
	getSpecs($lang_id);	
	
}
else
{
	echo "no value";
}

