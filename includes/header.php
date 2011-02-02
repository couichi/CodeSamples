<?php

echo '
		<html>
		<head>
		<title>CodeSamples
		</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="includes/style.css">
				<link rel="stylesheet" type="text/css" href="sh/styles/shCore.css">
			<link rel="stylesheet" type="text/css" href="sh/styles/shCoreEclipse.css">
			
		<script type="text/javascript" src="jquery/jquery-1.4.2.js"></script> 
		<script type="text/javascript" src="jquery/jquery.watermarkinput.js"></script> 
		  
		<script type="text/javascript" src="sh/scripts/shCore.js"></script> 
		<script type="text/javascript" src="includes/my.js"></script>
		
<script type="text/javascript">
SyntaxHighlighter.all();
jQuery(function($){
   $("#tag").Watermark("Libraries/Implementations/Softwares");
   $("#keyword").Watermark("type in search keyword");
   $("#code").Watermark("paste your code here");
   $("#description").Watermark("description of the above code");
});
</script>


		</head>
		';	
echo "<body>";
echo "<a href=index.php><img src='images/CodeSamples.png'></a><br>";
