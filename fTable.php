<?php
header("Content-type: text/html;charset=utf8");
						require("conn.php");
						@$uName = $_GET['uName'];
                    	$sql3 = "select id from user where uname = '$uName'";				
						$result3 = mysql_query($sql3);		
						$rows3=mysql_fetch_row($result3);
						$uId = $rows3[0];
						
						$sql4 = "select * from file where uid = '$uId'";
						$result4 = mysql_query($sql4);		
						
						echo "<table   width='600px' align='center'>";
						
						while(@$set=mysql_fetch_row($result4)){
               				 echo "<tr>";
								 echo "<td id='fTd' style='font-size:16px; font-family:幼圆; border-bottom:1px solid #eee; text-align:center; height:30px; line-height:30px; background-color:#eee;'>{$set[1]}</td>";
								 echo "<td style='font-size:16px; font-family:幼圆; border-bottom:1px solid #eee; text-align:center;  height:30px; line-height:30px; background-color:#eee;'>{$set[2]}</td>";
								 echo "<td style='font-size:16px; font-family:幼圆; border-bottom:1px solid #eee; text-align:center;  height:30px; line-height:30px; background-color:#eee;'>{$set[3]}K</td>";
								 echo "<td style='font-size:16px; font-family:幼圆; border-bottom:1px solid #eee; text-align:center;  height:30px; line-height:30px; background-color:#eee;'><a style='display:block;' href='download.php?fName={$set[5]}'><img src='images/download.jpg'></a></td>";
								 echo "<td style='font-size:16px; font-family:幼圆; border-bottom:1px solid #eee; text-align:center;  height:30px; line-height:30px; background-color:#eee;'>{$set[4]}</td>";
                          	 echo "</tr>";
        				}
						
       				  	echo "</table>";
						
?>