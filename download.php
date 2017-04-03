<?php
header("Content-type: text/html;charset=utf8");
$fName = $_GET['fName'];
header('content-disposition:attachment;filename='.basename($fName));
header('content-length:'.filesize($fName));
readfile($fName);