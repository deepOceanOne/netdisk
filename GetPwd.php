<?php
header("Content-type: text/html;charset=utf8");
	require("conn.php");
		
	$uName = $_GET['uName'];
	if($uName!=""){
		//准备sql语句
		$sql = "select uname from user where uname = '$uName'";
		//执行sql语句
		$result=mysql_query($sql);	
		$rows=mysql_fetch_row($result);
	
		if(!empty($rows[0])){
			$newUrl="forgetPwd.php"."?"."uName=".$uName."&"."uTip="."密码："; 
			echo "<script>location='$newUrl'</script>";
		}
		else
			echo "<script>history.go(-1);alert('用户名不存在！');</script>";
	
		//关闭资源
		mysql_close($conn);		
	}
?>
	