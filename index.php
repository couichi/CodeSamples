<?php
include "includes/header.php";


include "includes/autoload.php";



echo "<a href='search_all.php?lang=35'>PHP</a> ";
echo "<a href='search_all.php?lang=27'>Lisp</a> ";
echo "<a href='search_all.php?lang=47'>SQL</a> ";
echo "<a href='search_all.php?lang=39'>Python</a> ";

echo "<a href=''>scheme+gimp</a> <a href=''>Assembly</a> <a href=''>JavaScript</a>";
echo "<br>";



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
//echo "<a href='post_tags.php'>POST TAGS</a><br>";
/*
$postform = new Form();
echo "<form method=GET action=post.php>";
$postform->langSelect("");
$postform->tag("");
echo "<input type=submit value=post>";
echo "<br>";
$postform->codeArea("");
echo "<br>";
echo "<textarea rows=5 cols=80 name=descrip id=descrip title='describe the code above'>";
echo "</textarea><br>";

echo "</form>";
*/
	
$tl = new TotalLines();
$tl->connect();
$tl->getTotalLines();

?>
