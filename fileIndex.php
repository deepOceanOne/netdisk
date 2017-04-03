<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF8">
    <title>个人网盘</title>
    <link href="css/index.css" type="text/css" rel="stylesheet">
    <script type="text/javascript">
        window.onload = function () {
            var oSearchBox = document.getElementById("searchBox");
            oSearchBox.onfocus = function(){
                this.placeholder = "";
            }
            oSearchBox.onblur = function(){
                this.placeholder = "搜索上传的文件";
            }
			
			var oRca = document.getElementById("rCa");
			var oCa = document.getElementById("capcity");
			var num1 = 0.056*oRca.value;
			
		
			oCa.style.width = num1+"px";
			
			var oSBtn = document.getElementById("searchButton");
			var oMTb = document.getElementById("mainTb");
			
			
			
        }
	</script>
</head>
<body onselectstart="return false;">
    <div id="container">
        <div id="header">
            <div id="logo">
            <?php
				header("Content-type: text/html;charset=utf8");
				@$uName = $_GET['uName'];
				@$uPwd = $_GET['uPwd'];
  
				$Url="fileIndex.php"."?"."uName=".$uName."&"."uPwd=".$uPwd;                echo "<a href='$Url'><img src='images/logo.jpg'></a>";
			?>
				
            </div>
            <div id="userNav">
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
					
					if($str=="localhost/netdisk/index.php"){
						
					}
					else{
						@$uName = $_GET['uName'];
						@$uPwd = $_GET['uPwd'];
						echo "<h3>你好，$uName</h3>";
					}				
				?> 
            </div>
            <div id="search">
            <form action="search.php" method="get" onSubmit="return search()">
            <?php
			header("Content-type: text/html;charset=utf8");
							require("conn.php");
							@$uName = $_GET['uName'];
							@$uPwd = $_GET['uPwd'];
                    		$sql1 = "select id from user where uname = '$uName'";				
							$result = mysql_query($sql1);		
							$rows=mysql_fetch_row($result);
							$uId = $rows[0];
							echo "<input type='hidden' name='uName' value='$uName'>";
							echo "<input type='hidden' name='uPwd' value='$uPwd'>";
							echo "<input type='hidden' name='uId' value='$uId'>";
				
						?>
                    <input type="search" placeholder="搜索上传的文件" id="searchBox" name="fName">
                    <input type="submit" value="查找"id="searchButton">
            </form>
            </div>
            <div id="nav">
                <ul>
                    <li id="upLi"><form  action="upload.php" method="post" enctype="multipart/form-data">
                   		 <?php
						 header("Content-type: text/html;charset=utf8");
							require("conn.php");
							@$uName = $_GET['uName'];
							@$uPwd = $_GET['uPwd'];
                    		$sql1 = "select id from user where uname = '$uName'";				
							$result = mysql_query($sql1);		
							$rows=mysql_fetch_row($result);
							$uId = $rows[0];
							echo "<input type='hidden' name='uName' value='$uName'>";
							echo "<input type='hidden' name='uPwd' value='$uPwd'>";
							echo "<input type='hidden' name='uId' value='$uId'>";
				
						?>
                            <input id="file" type="file" name="myFile">
                            <input id="uploadButton" type="submit" value="上传">
                        </form></li>
                </ul>
            </div>
        </div>
        <div id="content">
            <div id="sideBar">
                <ul>
                    <li>
                    <?php
						header("Content-type: text/html;charset=utf8");
						require("conn.php");
						@$uName = $_GET['uName'];
						@$uPwd = $_GET['uPwd'];
						
						$Url="fileIndex.php"."?"."uName=".$uName."&"."uPwd=".$uPwd;
						
						echo "<a href='$Url'>全部文件</a>";
						
						?>
                    </li>
                    <li>
                    <?php
						header("Content-type: text/html;charset=utf8");
						require("conn.php");
						@$uName = $_GET['uName'];
						@$uPwd = $_GET['uPwd'];
						
						$imgUrl="fileIndex.php"."?"."uName=".$uName."&"."uPwd=".$uPwd."&"."fType="."image";
						
						echo "<a href='$imgUrl'>图片</a>";
						
						?>
                    
                    </li>
                    <li>
                    <?php
						header("Content-type: text/html;charset=utf8");
						require("conn.php");
						@$uName = $_GET['uName'];
						@$uPwd = $_GET['uPwd'];
						
						$docUrl="fileIndex.php"."?"."uName=".$uName."&"."uPwd=".$uPwd."&"."fType="."application";
						
						echo "<a href='$docUrl'>文档</a>";
						
						?>
                    </li>
                    <li>
                    <?php
						header("Content-type: text/html;charset=utf8");
						require("conn.php");
						@$uName = $_GET['uName'];
						@$uPwd = $_GET['uPwd'];
						
						$adUrl="fileIndex.php"."?"."uName=".$uName."&"."uPwd=".$uPwd."&"."fType="."audio";
						
						echo "<a href='$adUrl'>音频</a>";
						
						?>
                    </li>
                    <li><?php
						header("Content-type: text/html;charset=utf8");
						require("conn.php");
						@$uName = $_GET['uName'];
						@$uPwd = $_GET['uPwd'];
						
						$vdUrl="fileIndex.php"."?"."uName=".$uName."&"."uPwd=".$uPwd."&"."fType="."video";
						
						echo "<a href='$vdUrl'>视频</a>";
						
						?></li>
                </ul>
                <div id="capcity"></div>
                <?php
				header("Content-type: text/html;charset=utf8");
						require("conn.php");
						@$uName = $_GET['uName'];
                    	$sql1 = "select id from user where uname = '$uName'";				
						$result1 = mysql_query($sql1);		
						$rows1=mysql_fetch_row($result1);
						$uId = $rows1[0];
						
						$sql2 = "select sum(fsize) from file where uid = '$uId'";				
						$result2 = mysql_query($sql2);		
						$rows2=mysql_fetch_row($result2);
						$uCapcity = $rows2[0];
						
						$capcity = $uCapcity;
						$rCapcity = 2048 - $capcity;
		
						echo "<input id='rCa' type='hidden' value='$rCapcity'/>";
						echo "<div id='rcaDiv'>剩余容量：{$rCapcity}K</div>";
				?>
            </div>
            <div id="main">
            <?php
			header("Content-type: text/html;charset=utf8");
            echo "<ul>";
						
						  echo "<li style='font-size:14px; font-family:幼圆; border-bottom:1px solid white; color:red; background-color:#BFEFFF; height:29px; line-height:30px; width:60%;'>文件</li>";
						
						  echo "<li style='font-size:14px; font-family:幼圆; border-bottom:1px solid white; color:red; background-color:#BFEFFF;height:29px; line-height:30px; width:40%;'>上传日期</li>";
          				
						echo "</ul>";
						?>
                        
                <div id="mainTb">
                	<?php
					header("Content-type: text/html;charset=utf8");
					function curPageURL1(){
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
					
					$str =  substr(curPageURL1(),25);
					@$fName = $_GET['fName'];
					@$fType = $_GET['fType'];
					@$uName = $_GET['uName'];
    				@$uPwd = $_GET['uPwd'];
					
					$Url="fileIndex.php"."?"."uName=".$uName."&"."uPwd=".$uPwd."&"."fName=".$fName;
					$imgUrl="fileIndex.php"."?"."uName=".$uName."&"."uPwd=".$uPwd."&"."fType="."image";
					$docUrl="fileIndex.php"."?"."uName=".$uName."&"."uPwd=".$uPwd."&"."fType="."application";
					$adUrl="fileIndex.php"."?"."uName=".$uName."&"."uPwd=".$uPwd."&"."fType="."audio";
					$vdUrl="fileIndex.php"."?"."uName=".$uName."&"."uPwd=".$uPwd."&"."fType="."video";
					$str =urldecode($str);//url解码还原中文
					
					
					if($str==$Url){
						include("sTable.php");
						
					}
					else if($str==$imgUrl){
						include("classTable.php");
						
					}
					else if($str==$docUrl){
						include("classTable.php");
						
					}
					else if($str==$adUrl){
						include("classTable.php");
						
					}
					else if($str==$vdUrl){
						include("classTable.php");
						
					}
					else{
						include("fTable.php");
					}				
				?> 
                
                </div>
           
            </div>
        </div>

    </div>
</body>
</html>