<?php
	
include "includes/header.php";
include "includes/autoload.php";

$form = new Form("POST","post.php");
$form->langSelect("");
//echo "<br>";
$form->tag("");
echo "<div id=taglist></div><br>";
$form->codeArea("");
echo "<br>";
$form->descriptionArea("");
echo "<br>";
$form->endForm();
echo "<br>";