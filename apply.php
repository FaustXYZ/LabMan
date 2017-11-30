<?php
session_start();
// header ("connect-type:test/html;charset=utf8_bin");
date_default_timezone_set("Asia/Shanghai");
$nowtime = date("Y-m-d H:i:s");
$tt = date("YmdHis");
$id = $_SESSION['user']['uid'];
$reID = $_POST['reID'];
$name = $_POST['reagent'];
$spec = $_POST['size'];
$qty = $_POST['number'];
$price = $_POST['price'];
$dis = $_POST['discount'];
$sale = $_POST['salesman'];
$cell = $_POST['salescon'];
$company = $_POST['company'];
$remarks = $_POST['others'];
$orderID=$id.$tt;
if($dis==""){
	$dis=1;
}
// echo $dis;
// echo $name,$spec,$qty,$price,$dis,$sale,$company,$remarks;
include('connectDB.php');
$sql = "INSERT INTO think_apply (OrderID,ID,ReID,Applytime,Agentsname,Agentsize,AgentNum,SinglePrize,Discount,Saler,Company,Remarks,Connect)VALUES('$orderID','$id','$reID','$nowtime','$name','$spec','$qty','$price','$dis','$sale','$company','$remarks','$cell')";
// echo $sql;
// echo $sql;
if(mysql_query($sql)){
	echo '<font face="Times New Roman">Apply has been submitted successfully! Apply ID: <font color=red>',$orderID,'</font></br>Click <a href=applyinven.php><font color=red>here</font></a> to go back.</font>';
}
?>

