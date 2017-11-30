<?php
session_start();
$id = $_SESSION['user']['uid'];
$oripwd = MD5($_POST['oripassword']);
$newpwd = MD5($_POST['newpassword']);
include('connectDB.php');
$check = mysql_query("select * from think_register where ID ='$id'");
// $infor = mysql_query("select * from think_register where ID='$loginid' and Password='$loginpassword' ");
$checkpwd=mysql_fetch_array($check);
if($oripwd==$checkpwd['Password']){
	$upnewpwd="UPDATE think_register SET Password='$newpwd'";
	if(mysql_query($upnewpwd)){
		session_unset();//free all session variable
        session_destroy();//销毁一个会话中的全部数据
        setcookie(session_name(),'',time()-3600);
        header("refresh:5;url=login.html");
		echo 'Password has been changed, please re-login.</br>You will be automatically in login page in 5 seconds, if not, please click<a href="login.html"><font color=red> HERE </font></a>.';
	}
}
else{
	header("refresh:5;url=editpassword.php");
	echo 'Wrong password, please check again.</br>You will be automatically back to Password Edit Page in 5 seconds, if not, please click<a href="editpassword.php"><font color=red> HERE </font></a>.';
}
include('disconnectDB.php');
?>