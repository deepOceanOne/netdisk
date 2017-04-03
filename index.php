<!doctype html>
<html>
<head>
<meta charset="utf8">
<title>网盘-欢迎登录</title>
<link href="css/login.css" type="text/css" rel="stylesheet">
<script type="text/javascript">
window.onload=function(){
	var oUser = document.getElementsByTagName("input")[0];
	var oUserPwd = document.getElementsByTagName("input")[1];
	var oLogBtn = document.getElementById("loginBtn");
	var oTips = document.getElementById("form-tips");
	
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
	
	//用户登录时信息填写的验证
	oLogBtn.onclick=function submitFun(){
		if(oUser.value==""||oUserPwd.value==""){
			oTips.style.borderColor = "#FFC1C1";	
			oTips.style.backgroundColor="#FFE4E1";		
			oTips.style.color = 'red';
			oTips.innerHTML = "请输入用户名和密码！";
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
            <p>欢迎登录</p>
        </div>
        <div id="content" style="background-image:url(images/loginBg.jpg)">
            <form action="login_confirm.php" method="get" onSubmit="return submitFun();">
                <div id="form-header"><strong>帐户登录</strong></div>
                <div id="form-tips">公共场所不建议自动登录</div>
                <div id="form-input">
                    <input type="text" placeholder="用户名" name="uName"/><br>
                    <input type="password" placeholder="密码" name="uPwd"/>
                </div>
                <br>
                <a href="forgetPwd.php">忘记密码</a>
                <input id="loginBtn" type="submit" value="登录">
                <div id="content-footer">
                    <a href="register.php">立即注册</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>