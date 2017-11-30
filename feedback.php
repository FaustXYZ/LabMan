<?php
session_start();
include("connectDB.php");
$ddl = $_POST['ddl'];
$id = $_SESSION['user']['uid'];
// echo $id;
date_default_timezone_set("Asia/Shanghai");
$nowtime = date("Y-m-d H:i:s");
$ddl_std = $ddl.' 20:00:00';
// echo $ddl_std,$nowtime;
if($ddl_std > $nowtime){
	echo 'The chosen deadline has not closed, you can not check the comments now. please click <a href="checkcomments.php"><font color=red>here</font></a> to go back, <font color=red>refresh</font> and repick!';
	exit;
}
$sub_check=mysql_query("select * from think_file WHERE ID='$id' and subtime='$ddl' ");
if(!mysql_fetch_array($sub_check)){
	echo 'You have not submitted report on this ddl!</br>click <a href="checkcomments.php"><font color=red>here</font></a> to go back';
	exit;
}
$sub_check2=mysql_query("select * from think_search WHERE ID='$id' ");
if(mysql_fetch_array($sub_check2)){
$edit = "UPDATE think_search SET realtime='$nowtime',subtime='$ddl' where ID='$id' ";
// echo '2';
  if(mysql_query($edit)){
	// echo'...';
	echo 'Succesfully! click <a href="checkcomments.php"><font color=red>here</font></a> to go back see the results!';
  }
}
else{
	// echo '3';
	$add = mysql_query("INSERT INTO think_search (ID,subtime,realtime) VALUES('$id','$ddl','$nowtime')");
	if($add){
		echo 'Succesfully! click <a href="checkcomments.php"><font color=red>here</font></a> to go back see the results!';
	}
}
// echo $edit;

include("disconnectDB.php");
?>