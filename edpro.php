<?php
date_default_timezone_set("Asia/Shanghai");
$tt = date("YmdHis");
$nowtime = date("Y-m-d H:i:s");
// echo $tt;
session_start();
$id = $_SESSION['user']['uid'];
// echo $id;
$realname = $_POST['realname'];
// echo $realname;
$grade = $_POST['grade'];
$gender = $_POST['gender'];
$guider = $_POST['guider'];
$newmail = $_POST['nemail'];
$ima = $_FILES['image'];
$nam = $ima['name'];
$suc = explode('.',$nam);
$succ = $suc[count($suc)-1];
include('connectDB.php');
$uploadir="./image/";
$newima = $uploadir.$id.$tt.'.'.$succ;
// echo $newima;
mysql_query("UPDATE think_profile SET LastEdit='$nowtime' WHERE ID='$id' ");
if($ima['size'] > 1000000){
	echo 'Image too large!';
	exit;
}
if (file_exists($newima)){
	echo 'File Already exists.</br>';
	exit;
}
else{
	if(move_uploaded_file($_FILES['image']['tmp_name'],$newima)){;
		echo 'Image successfully uploaded</br>';
		// echo '<img src='$uploadfile'>';
}
}
if($realname==""){
}
else{
	// echo 'dfef';
	if(mysql_query("UPDATE think_profile SET RealName='$realname' WHERE ID='$id' ")){
		// $dd = "UPDATE think_profile SET RealName='$realname' WHERE ID='$id' ";
		// echo $dd;
		echo 'RealName has been changed!</br>';
	}
}
if($grade==""){
}
else{
	// echo 'dfef';
	if(mysql_query("UPDATE think_profile SET Grade='$grade' WHERE ID='$id' ")){
		echo 'Grade has been changed!';
	}
}
if($gender==""){
}
else{
	// echo 'dfef';
	if(mysql_query("UPDATE think_profile SET Gender='$gender' WHERE ID='$id' ")){
		echo 'Gender has been changed!</br>';
	}
}
if($guider==""){	
}
else{
	// echo 'dfef';
	if(mysql_query("UPDATE think_profile SET Guider='$guider' WHERE ID='$id' ")){
		echo 'Guider has been changed!</br>';
	}
}
if($newmail==""){
}
else{
	// echo 'dfef';
	if(mysql_query("UPDATE think_register SET email='$newmail' WHERE ID='$id' ")){
		echo 'Email has been changed!</br>';
	}
}
if($ima['name']==""){
}
else{
	// echo 'dfef';
	if(mysql_query("UPDATE think_profile SET Image='$newima' WHERE ID='$id' ")){
		echo 'Profile Image has been changed!</br>';
	}
}
echo '</br></br><font face="Times New Roman">Please click <a href="editprofile.php"><font color=red>Here</font></a> to go back.</font>'; 
include('disconnectDB.php');
?>