<?php	
header("Content-type: text/html;charset=utf8");
	require("conn.php");		
    //获取用户
    $uName = $_GET['uName'];
    $uPwd = md5($_GET['uPwd']);            
                
    //准备sql语句
    $sql1 = "select upwd from user where  uname  = '$uName'";
    //执行sql语句
    $result = mysql_query($sql1);
    $rows=mysql_fetch_row($result);
				
	$newUrl="fileIndex.php"."?"."uName=".$uName."&"."uPwd=".$uPwd;   
	if($uPwd === $rows[0]){
        echo "<script>location='$newUrl'</script>";
    }
    else{
        echo "<script>history.go(-1);alert('密码错误');</script>";
    }          
    
?>