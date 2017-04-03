<?php
header("Content-type: text/html;charset=utf8");
//获取上传文件名到变量myFileName中,错误代码到myFileError中，临时上传文件夹到myTmpName
$myFileName = $_FILES['myFile']['name'];
$myFileError = $_FILES['myFile']['error'];
$myTmpFile = $_FILES['myFile']['tmp_name'];

$notError = checkError($myFileName,$myFileError);
if($notError){
    uploadFile($myFileName,$myTmpFile);
}

/*
*检验上传文件是否正确
*/
function checkError($fileName,$fileError){
    if(!empty($fileName)){//判断文件是否为空
        if($fileError>0){//文件错误码大于0时有错误，为0无错
            $errorMsg = "";
            switch($fileError){
                case 1:
                    $errorMsg = "上传文件大小超过php.ini限制";
                    echo "<script>alert('$errorMsg');</script>";
                    break;
                case 2:
                    $errorMsg = "文件上传大小超过前台表单指定限制";
                    echo "<script>alert('$errorMsg');</script>";
                    break;
                case 3:
                    $errorMsg = "文件上传不完整";
                    echo "<script>alert('$errorMsg');</script>";
                    break;
                case 4:
                    $errorMsg = "没有上传文件";
                    echo "<script>alert('$errorMsg');</script>";
                    break;
            }

        }
        else//上传文件通过检验，可以上传
            return true;
    }
    else{//文件为空，用户为选择要上传的文件
        echo "<script> 
				alert('请选择上传文件');		
				history.go(-1);
			  </script>";
    }
}

/*
*上传通过检验的文件
*/
function uploadFile($fileName,$tmpName){
    $dirName = 'upload';
    $secondDirName = 'upload/'.$_POST['uName'];
    $thirdDirName = 'upload/'.$_POST['uName'].'/'.date('ymd');
    if(!is_dir($dirName)){//文件夹不存在，就创建该文件夹
        mkdir($dirName);
    }
    if(!is_dir($secondDirName)){//文件夹不存在，就创建该文件夹
        mkdir($secondDirName);
    }
    if(!is_dir($thirdDirName)){//文件夹不存在，就创建该文件夹
        mkdir($thirdDirName);
    }
    if(is_uploaded_file($tmpName)){//判断是否为上传文件
        $uploadedFilePath= $thirdDirName.'/'.$fileName; //为上传的文件进行重命名，避免重复命名导致的文件覆盖
        if(move_uploaded_file($tmpName,$uploadedFilePath)){
			require("conn.php");
			//获取当前用户ID（$rows[0]）
			$uId = $_POST['uId'];
												
			if(!empty($uId)){
				$fName = $_FILES['myFile']['name'];
				$sql1 = "select fname from file where fname='$fName'";					
				mysql_query($sql1);
				
				$set=mysql_fetch_row(mysql_query($sql1));
				
					$fType = $_FILES['myFile']['type'];
					$fSize = ceil($_FILES['myFile']['size']/8192);
					$fTime = date("Y-m-d H:i:s",time()+25200);
					$fPath = $uploadedFilePath;
									
					$sql = "insert into file(fname,ftype,fsize,ftime,fpath,uid) values('$fName','$fType','$fSize','$fTime','$fPath','$uId')";					
					mysql_query($sql);				
					mysql_close($conn);
					
					$newUrl="fileIndex.php"."?"."uName=".$_POST['uName']."&"."uPwd=".$_POST['uPwd'];
					echo "<script>location='$newUrl'</script>";
				
				
				
				
			}
			else
				echo "<script>alert('请登录！');history.go(-1);</script>";     
        }
        else
            echo "<script>alert('文件上传失败');</script>";
    }
    else
        echo "<script>alert('错误！不是上传文件');</script>";
}
?>
