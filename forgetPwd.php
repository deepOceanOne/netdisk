<!doctype html>
<html>
<head>
<meta charset="utf8">
<title>找回密码</title>
<link href="css/forgetPwd.css" type="text/css" rel="stylesheet">
</head>

<body onselectstart="return false;">
<div id="container">
	<div id="header">
        <img src="images/logo.jpg">
        <p><a href="index.php">我的网盘</a></p>
    </div>
    <div id="content">
         <form action="GetPwd.php" method="get" onSubmit="return submitFun();">
         	 <?php
			 header("Content-type: text/html;charset=utf8");
					function curPageURL(){
						$pageURL = 'http';
						$pageURL .= "://";
						if ($_SERVER["SERVER_PORT"] != "80") 
						{
							$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
						} 
						else 
						{
							$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
						}
						return $pageURL;
					}
					$str =  substr(curPageURL(),7);
					
					if($str!="localhost/netdisk/index.php"){
						require("conn.php");
					
						@$uName = $_GET['uName'];
						@$uTip = $_GET['uTip'];
						//准备sql语句
						$sql = "select upw from user where uname = '$uName'";
						//执行sql语句
						$result=mysql_query($sql);	
						$rows=mysql_fetch_row($result);
						$info = $uName.$uTip.$rows[0];
						echo "<div id='form-tips'>$info</div>";
					}	
							
				?>         
             <div id="form-input">
                 <p>用户名：</p><input type="text" value="" placeholder="用户名" name="uName"/><br>
                 <p>验证码：</p><input type="text" value="" placeholder="请输入右侧验证码" />
                 <?php
				 header("Content-type: text/html;charset=utf8");
				 	$arr1=range(0,9);
					$arr2=range("a","z");
					$arr3=range("A","Z");
					$arr=array_merge($arr1,$arr2,$arr3);
					
					$str1 = implode($arr);
					$str2 = strtolower(substr(str_shuffle($str1),0,4));
					echo "<div id='confirmDiv'>$str2</div>";			 
				 ?>       
             </div>
             <br>
             <input id="loginBtn" type="submit" value="提交">
         </form>
    </div>
</div>
</body>
<script type="text/javascript">
window.onload = function(){
	//随机改变验证码框的颜色
	var cfmDiv = document.getElementById("confirmDiv");
	var colors = ["#969","#c3f","#066","#8b8986","#8b7b8b"];
	var randomNum = parseInt(Math.random()*5);
	cfmDiv.style.backgroundColor = colors[randomNum];
	
	//placeholder的设置
	var oUser = document.getElementsByTagName("input")[0];
	var oCfm = document.getElementsByTagName("input")[1];
	oUser.onfocus = function(){
        this.placeholder = "";
    }
    oUser.onblur = function(){
        this.placeholder = "用户名";
    }
	
	oCfm.onfocus = function(){
        this.placeholder = "";
    }
    oCfm.onblur = function(){
        this.placeholder = "请输入右侧验证码";
    }

	//验证码的验证
	
	var oLogBtn = document.getElementById("loginBtn");
	
	oLogBtn.onclick=function submitFun(){
		if(oUser.value!=""&&oCfm.value==cfmDiv.innerHTML)
			return true;
		
		else{	
			oUser.style.borderColor = "red";
			oUser.placeholder = "";
			if(oUser.value != ""){
				oUser.style.borderColor = "#ccc";
				oCfm.style.borderColor = "red";	
			}
			return false;
		}			
	}
}
</script>
</html>