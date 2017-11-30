<?php
session_start();
$checkid = $_SESSION['user']['uid'];
include('connectDB.php');
$appid = $_POST['ID'];
$appname = $_POST['name'];
$appnum = $_POST['num'];
$appsize = $_POST['size'];
$appprice = $_POST['price'];
$appdis = $_POST['dis'];
$appsaler = $_POST['salesman'];
$appcomp = $_POST['company'];
$apprem = $_POST['remarks'];
$apptime = $_POST['subtime'];
$OrderID = $_POST['OrderID'];
$comment = $_POST['comments'];
// print_r($apptime);
$checkre = $_POST['check'];
for ($i=0; $i<count($appid); $i++){
	// $appidse=$appid[$i];
	$appID=$OrderID[$i];
	$checkrein=$checkre[$i];
	$comm = $comment[$i];
	if($checkrein !='wait'){
	// echo $checkrein;
	// $sqlup="UPDATE think_apply SET checkapply='$checkrein', CheckID='$checkid' WHERE ID='$appidse' and Applytime='$apptimese' ";
	$checkapp = "INSERT INTO think_checkapp (status,comment,CheckID,OrderID)VALUES('$checkrein','$comm','$checkid','$appID')";
	// echo $checkapp;
	// echo $sqlup;
	if(mysql_query($checkapp)){
		echo '<font face="Times New Roman">Request<font color=red> ',$appID, ' </font>has been updated</font></br>';
	}
}
}
echo '</br><font face="Times New Roman">Please Click <a href=applycheck.php><font color=red>here</font></a> to come back.</font>';
include('disconnectDB.php');
// print_r($appid);
?>