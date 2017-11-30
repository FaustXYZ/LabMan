<?php
// if(!isset($_POST['submit'])) {
// 	exit('illegal');
// }
// echo "UI斧王i";
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$confirm = $_POST['confirm'];
// echo $username;
 // echo $id,$username,$password,$email;

// FORMAT CHECK
if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
  exit('<font color=#696969><font face="Times New Roman">error: The username is not legal.Please click <a href="javascript:window.location.href=document.referrer;"><font color=#800000>here</font></a> to go back.</font></font>');
}
if(strlen($id)==0){
  exit('<font color=#696969><font face="Times New Roman">error: The ID cannot be empty.Please click <a href="javascript:window.location.href=document.referrer;"><font color=#800000>here</font></a> to go back.</font></font>');
}
if(strlen($password) < 6){
	exit('<font color=#696969><font face="Times New Roman">error: password should at least be 6 letters.Please click <a href="javascript:window.location.href=document.referrer;"><font color=#800000>here</font></a> to go back.</font></font>');
}
if($password!=$confirm){
	exit('<font color=#696969><font face="Times New Roman">error: Two passwords should be the same.Please click <a href="javascript:window.location.href=document.referrer;"><font color=#800000>here</font></a> to go back.</font></font>');
}
if(!preg_match('/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/', $email)){
     exit('<font color=#696969><font face="Times New Roman">error: The email address is in wrong format.Please click <a href="javascript:window.location.href=document.referrer;"><font color=#800000>here</font></a> to go back.</font></font>');
}
include('connectDB.php');
$check_query1 = mysql_query("select id from think_register where ID='$id' limit 1");
$check_query2 = mysql_query("select id from think_register where Name='$username' limit 1");
$check_query3 = mysql_query("select id from think_register where email='$email' limit 1");
// AVALIABLITY CHECK
if(mysql_fetch_array($check_query1)){
	echo '<font color=#696969><font face="Times New Roman">error!</br> ID: ',$id,' already existed.Please click <a href="javascript:window.location.href=document.referrer;"><font color=#800000>here</font></a> to go back.</font></font>';
	exit;
}
if(mysql_fetch_array($check_query2)){
	echo'<font color=#696969><font face="Times New Roman">error!</br> Username: ',$id,' already existed.Please click <a href="javascript:window.location.href=document.referrer;"><font color=#800000>here</font></a> to go back.</font></font>';
	exit;
}
if(mysql_fetch_array($check_query3)){
	echo '<font color=#696969><font face="Times New Roman">error!</br> Email:  ',$id,' already existed.Please click <a href="window.location.href=document.referrer;"><font color=#800000>here</font></a> to go back.</font></font>';
	exit;
}
$password = MD5($password);
date_default_timezone_set("Asia/Shanghai");
$regtime = date("Y-m-d H:i:s");
$lastlog = date("Y-m-d H;i:s");
$regip=$_SERVER["REMOTE_ADDR"];
$sql = "INSERT INTO think_register (ID,Name,Password,email,regtime,lastlog,auth,regip,loginip)VALUES('$id','$username','$password','$email','$regtime','$lastlog','0','$regip','0')";
// echo $sql;
$sql2 = "INSERT INTO think_profile (ID,RealName,Grade,Gender,LastEdit,Guider,Image)VALUES('$id','0','0','0','$regtime','0','./image/exp.jpg')";
// echo $sql2;
// mysql_query($sql2);
 // echo $sql;

if((!(mysql_query($sql)))||!((mysql_query($sql2)))) {
	echo 'test failed';
} else {
	// echo '<font color=#DC143C>Succefully registered, please click <a href="login.html">here</a> to login</font>';
	header("refresh:3;url=login.html");
		echo '<font size=4><font face="Courier New"><font color=#696969>Succefully registered!</br>You will automatically be in Login page in 3 seconds.</br>If not, please click <a href="login.html"><font color=#8B0000>here</font></a> to login</font></font></font>.';
}
// if(mysql_query($sql)){
// 	echo'successfully registered, click here <a href="reg2.html">to login</a>';
// }
// } else {
// 	echo 'sorry! failed to add character: ',mysql_error(),'<br/>';
// 	echo 'click here <a href = "javascript:history.back(-1);">back</a>to try again';
// }
include('disconnectDB.php')
?>


