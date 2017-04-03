<?php	
	header("Content-type: text/html;charset=utf8");
    $conn = mysql_connect("localhost","root","");				
	mysql_select_db("netdisk");
	mysql_query('SET NAMES UTF8');			
?>