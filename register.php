<!doctype html>
<html>
<head>
<meta charset="utf8">
<title>个人注册</title>
<link href="css/register.css" type="text/css" rel="stylesheet">
<script type="text/javascript">
window.onload = function(){
	//用户注册的验证
	var oUser = document.getElementsByTagName("input")[0];
	var oUserPwd = document.getElementsByTagName("input")[1];
	var oLogBtn = document.getElementById("loginBtn");
	var oUname = document.getElementsByName("uName")[0];
	var oUpwd = document.getElementsByName("uPwd")[0];
	
	oUser.onfocus = function(){
        this.placeholder = "";
    }
    oUser.onblur = function(){
        this.placeholder = "用户名";
    }
	oUserPwd.onfocus = function(){
        this.placeholder = "";
    }
    oUserPwd.onblur = function(){
        this.placeholder = "密码";
    }
	
	oLogBtn.onclick=function submitFun(){
		if(oUser.value==""||oUserPwd.value==""){	
			oUname.style.borderColor = "red";
			oUname.placeholder = "";
			if(oUname.value != ""){
				oUname.style.borderColor = "#ccc";
				oUpwd.style.borderColor = "red";
				oUpwd.placeholder = "";	
			}
			return false;
		}	
		else
			return true;
	}
}
</script>
</head>

<body onselectstart="return false;">
<div id="container">
	<div id="header">
        <img src="images/logo.jpg">
        <p>欢迎注册</p>
    </div>
    <div id="content">
         <form action="register_user.php" method="get" onSubmit="return submitFun();">
             <div id="form-input">
                 <input type="text" placeholder="用户名" value="" name="uName"/><br>
                 <input type="password" placeholder="密码" value="" name="uPwd"/>
             </div>
             <br>
             <input id="radioBtn" type="radio" checked>我已阅读并同意注册协议<br>
             <input id="loginBtn" type="submit" value="立即注册">
         </form>
    </div>
</div>
</body>
</html>