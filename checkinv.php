<?php
session_start();
if (!isset ($_SESSION['user'])){
	header("refresh:5;url=login.html");
echo '<font size=4>You need to log in first, the page will automatically be into login page in 5 seconds.</br>If not, please click <a href="login.html"><font color="red">here</font> </a>to login.</font>' ;
exit () ; 
 } 
 else {
 	if($_SESSION['user']['auth']<1){
 		header("refresh:5;url=logout.php");
echo '<font size=4><font face="Times New Roman">You have no authority, please log out and change an account, you will automatically be logged out in 5 seconds.</br>If not, please click <a href="logout.php"><font color="red">here</font> </a>.</font></font>' ;
exit();
 	}
 }
// header ("connect-type:test/html;charset=utf8_bin");
// date_default_timezone_set("Asia/Shanghai");
// $nowtime = date("Y-m-d H:i:s");
// $tt = date("YmdHis");
$id = $_SESSION['user']['uid'];
$name = $_POST['invenrea'];
$size = $_POST['invensiz'];
// echo $name,$size;
include('connectDB.php');
$search = mysql_query("select * from think_reagent where Name='$name' and Size='$size' ");
// if($search){
// 	echo '1';
// }
// echo $dis;
// echo $name,$spec,$qty,$price,$dis,$sale,$company,$remarks;
echo '<font face="Times New Roman"><font size=4>Storage:</font></font></br>';
while($rs=mysql_fetch_array($search)){
	echo '</font></br><font color=red>',$rs['Name'],'&nbsp&nbsp',$rs['Size'],'&nbsp&nbsp',$rs['Number'],'&nbsp&nbsp',$rs['Store'],'</font></br></font>';
}
echo '</br><font face="Times New Roman"><font size=4>Please click <a href="checkinventory.php"><font color="red">here</font> </a>to go back</font></font>.';
?>

