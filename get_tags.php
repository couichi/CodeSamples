<?php
	
include "includes/autoload.php";

//$lang_id=47;
if(isset($_POST['Lang']))
{
	$lang_id=$_POST['Lang'];
	
getSpecs($lang_id);	
	
}
else
{
	echo "no value";
}


function getSpecs($lang_id)
{
//$cols=array('speciality');

//$db = new DbConfig();
$db = new SelectTags();

$sql = sprintf("select speciality from specialities inner join lang_specs where id=sp_id and lang_id=%s",$lang_id);
//$db->squery($sql)->display($cols);
$db->squery($sql)->display();
}