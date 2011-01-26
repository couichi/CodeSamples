<?php

include "includes/autoload.php"

$ck = new Validation();
$code = "";

echo $ck->checkCode($code)->exlen;