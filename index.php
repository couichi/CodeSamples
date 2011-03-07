<?php
include "includes/header.php";
include "includes/autoload.php";
echo "<hr>";
$form = new Form("GET","search.php");
	

echo "<select name=type><option value=code>code</option><option value=descrip>description</option></select>";
echo "<input type=text name=keyword id=keyword size=36 title='search code or description'>";
echo "<br>";
$form->langSelect("");
$form->tag("");
echo "<div id=taglist></div>";

//echo "<input type=submit value=search>";
$form->endForm();

echo "<hr>";	
echo "<a href='post_form.php'>POST CODE</a><br>";

	
$tl = new TotalLines();
$tl->connect();
$tl->getTotalLines();

?>
