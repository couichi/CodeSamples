<?php
	
include "includes/header.php";
include "includes/autoload.php";
echo "<h3>Set new tags</h3>";
$form = new Form("POST","set_tags.php");

$form->langSelect("");
echo "<br>";
$form->newTag();
echo "<br>";
$form->endForm();