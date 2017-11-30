<?php
session_start();
 if(isset($_SESSION['user'])){
 	header("refresh:5;url=mana.php");  
        echo '<font size=4><font face="Courier New"><font color=#696969>You have already logged in and will be in Management Page in 5 seconds automatically, if not, you can click <a href="mana.php"> <font color="red">here</font></a>.</font></font></font>';
        exit;
 }
 if(isset($_POST['id'])){
$loginid = $_POST['id'];
$loginpassword = MD5($_POST['password']);
}
 // echo $loginid, $loginpassword;
include('connectDB.php');
$infor = mysql_query("select * from think_register where ID='$loginid' and Password='$loginpassword' ");
 // echo $infor;
$verified = mysql_fetch_array($infor);
 // echo $verified['Name'];
// $logname = mysql_query("select Name from think_register where ID='$loginid' ");
// $name = mysql_fetch_array($logname);
date_default_timezone_set("Asia/Shanghai");
$logintime = date("Y-m-d H:i:s");
$loginip=$_SERVER["REMOTE_ADDR"];
if(($verified)){
		$_SESSION['user'] = [
		'uname' => $verified['Name'],
		// 'uid' => $loginid,
		'ulastlogtime' =>$verified['lastlog'],
		'ulastlogip' =>$verified['loginip'],
        'uid' =>$verified['ID'],
        'auth' =>$verified['auth']
	];
	// echo $_SESSION['user']['ulast log time'];
		$uptime="UPDATE think_register SET lastlog='$logintime' WHERE ID='$loginid'";  
        $upip="UPDATE think_register SET loginip='$loginip' WHERE ID='$loginid'";  
        if (mysql_query($uptime)){
        	// echo 'last login time updated!';
        }
        if(mysql_query($upip)){
            // echo 'last login ip updated!';
        }  
        $_SESSION['user']['ulastlogtime'] =$logintime;
        $_SESSION['user']['ulastlogip']=$loginip;
        header("refresh:5;url=mana.php");  
        echo '<font size=4><font face="Courier New"><font color=#696969>Welcome back,',$_SESSION['user']['uname'],'!
        </br>You will automatically be in Management page in 5 seconds.</br>If not, please click <a href="mana.php"><font color=#8B0000>here</font></a>.</font></font></font></br></br><font size=3><font face="Times New Roman">Or you can click <a href="logout.php"><font color="red">here</font></a> to logout.</font></font>';   
}
else{
	exit ('<font size=4><font face="Times New Roman">Wrong password/ID, please check again.</br></br>Click <a href="login.html"><font color="red">here</font></a> to go back.</font></font>');
}
include('disconnectDB.php');
?>
