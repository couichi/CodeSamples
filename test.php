<?php

//date type for mysql format
//css centering
//stored procedure
//open css/php/javascript/scheme codes
//count lines
	

include "includes\header.php";
include "includes/vars.php";

echo "<img src='images/logo.gif'>";

$txt = "
	<table>
	
	<tr class=problem2>
	<td><img src='images/monster2.gif'></td>
	<td><div class=ltip></div>
	<div class=mesbox2> message</div></td>
	</tr>

	<tr class=problem3>
	<td><img src='images/monster3.gif'></td>
	<td><div class=ltip></div>
	<div class=mesbox2> message</div></td>
	</tr>

	<tr class=problem2>
	<td><img src='images/monster2.gif'></td>
	<td><div class=ltip></div>
	<div class=mesbox2> message</div></td>
	</tr>

	
	</table>
	";

echo $txt;


//echo "<div class='problem' style='background-image:url(images/bg_200571.png);'>";
echo "<div class='problem'>";
echo "<div class=monster><img src='images/monster2.gif'></div>";
echo "</div>";
echo "<div class=dark>";
echo "<div class=monster>";
echo "<img src='images/allow.gif'>";
echo "</div>";
echo "<div class=mesbox>";
echo "<br>";
echo "Convert 1975-12-01 03:03:33 into the unix time stamp<br>";
echo "<br><br>";
echo "Example: 2011-01-02 04:28:18 -> 1293910098<br><br>";
echo "<input type=text size=19><br>";
echo "<input type=submit>";
echo "</div>";
echo "</div>";

echo time();
echo "<br>";
echo date("Y-m-d H:i:s", time());

/*
//code,description,lines,langid,date
$params = array("code"=>"test code","description"=>"test description","lines"=>"1","lang"=>"1","date"=>"2010-12-28 12:12:12");
include "includes/autoload.php";
$db = new PdoConnect();
$db->connect();

//$db->codeInsert($params);



$sql="select * from langs";
$res = $db->squery($sql);

foreach($res as $row)
{
	//echo "<option value='".$row['id']."' \$s[".$row['id']."]>".$row['langname']."</option>\n";
	

	echo '$langs[] = array('.$row['id'].',"'.strtolower($row['langname']).'");';
	echo "\n";

		
	//echo $row['langname']."<br>";
}
*/
	
//print_r($langs);


?>
	<table width=600 border=1><td>a</td></table>
<form>
<textarea rows=50 cols=80>
</textarea>
</form>