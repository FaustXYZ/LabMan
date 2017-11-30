<?php
session_start();
$id = $_SESSION['user']['uid'];
$auth=$_SESSION['user']['auth'];
$timeduring = $_POST['applyfeedback'];
$oID = $_POST['oID'];
date_default_timezone_set("Asia/Shanghai");
$nowtime = date("Y-m-d H:i:s");
// $date = date('Y-m-d', strtotime('-7 days'));
// echo $date;
if ($timeduring=='last7day'){
	$begintime = date('Y-m-d', strtotime('-7 days')).' 00:00:00';
}
if ($timeduring =='last2week'){
	$begintime = date('Y-m-d', strtotime('-14 days')).' 00:00:00';
}
if($timeduring =='last1month'){
	$begintime = date('Y-m-d', strtotime('-31 days')).' 00:00:00';
}
if($timeduring =='last3month'){
	$begintime = date('Y-m-d', strtotime('-92 days')).' 00:00:00';
}
if($timeduring =='all'){
	$begintime = '1970-01-01 00:00:00';
}
// echo $begintime;
include('connectDB.php');
if($auth<2){
	if($oID==""){
$result=mysql_query("select *  from think_apply where Applytime >='$begintime' and Applytime<='$nowtime' and ID='$id' ");
echo '<font color=#00629b><font size=2><font face="Times New Roman">OrderId:ID:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspName:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspApplytime:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSpec:&nbsp&nbsp&nbsp&nbsp&nbsp&nbspQty:&nbspUnit price:&nbsp&nbsp&nbspDiscount:&nbsp&nbsp&nbspSalesman:&nbsp&nbspCompany:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspReamrks:</font></font></font></br>';
while($rs=mysql_fetch_array($result)){ 
	echo '<font face="Times New Roman">',$rs['OrderID'],'&nbsp&nbsp',$rs['ID'],'&nbsp&nbsp',$rs['Agentsname'],'&nbsp&nbsp',$rs['Applytime'],'&nbsp&nbsp',$rs['Agentsize'],'&nbsp&nbsp',$rs['AgentNum'],'&nbsp&nbsp',$rs['SinglePrize'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',$rs['Discount'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',$rs['Saler'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',$rs['Company'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',$rs['Remarks'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</br>Status</font></br>';
	$imd= $rs['OrderID'];
    $com=mysql_query("select * from think_checkapp where OrderID = '$imd' ");
    // if($com){
    // 	echo '11';
    // }
      while($rs2=mysql_fetch_array($com)){
      	 echo '<font face="Times New Roman">',$rs2['CheckID'],'&nbsp&nbsp<font color=red>',$rs2['status'],'</font>&nbsp&nbsp',$rs2['comment'],'</font></br>';
      }
      echo '</br>';
}
}
else{
	$result=mysql_query("select *  from think_apply where OrderID='$oID' and ID='$id'");
	$fr = mysql_fetch_array($result);
	// echo $result2;
	if(!$fr){
		echo '<font color=#000000><font size=3><font face="Times New Roman">Wrong OrderID, or it was not submitted by you, Please Click <a href=feedbackrequest.php><font color=red>here</font></a> to come back and recheck.</font></font></font>';
		exit;
	}
	echo '<font color=#00629b><font size=2><font face="Times New Roman">OrderId:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspID:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspName:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspApplytime:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSpec:&nbsp&nbsp&nbsp&nbsp&nbsp&nbspQty:&nbspUnit price:&nbsp&nbsp&nbspDiscount:&nbsp&nbsp&nbspSalesman:&nbsp&nbspCompany:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspReamrks:</font></font></font></br>';

	// echo 'dd';
	echo '<font face="Times New Roman">',$fr['OrderID'],'&nbsp&nbsp',$fr['ID'],'&nbsp&nbsp',$fr['Agentsname'],'&nbsp&nbsp',$fr['Applytime'],'&nbsp&nbsp',$fr['Agentsize'],'&nbsp&nbsp',$fr['AgentNum'],'&nbsp&nbsp',$fr['SinglePrize'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',$fr['Discount'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',$fr['Saler'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',$fr['Company'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',$fr['Remarks'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</br>Status</font></br>';
	$imd= $fr['OrderID'];
    $com=mysql_query("select * from think_checkapp where OrderID = '$imd' ");
    // if($com){
    // 	echo '11';
    // }
      while($rs2=mysql_fetch_array($com)){
      	 echo '<font face="Times New Roman">',$rs2['CheckID'],'&nbsp&nbsp<font color=red>',$rs2['status'],'</font>&nbsp&nbsp',$rs2['comment'],'</font></br>';
      }
      echo '</br>';
}
}
if($auth>=2){
	// echo '1';
	if($oID==""){
		// echo '2';
	$result=mysql_query("select *  from think_apply where Applytime >='$begintime' and Applytime<='$nowtime'");
echo '<font color=#00629b><font size=2><font face="Times New Roman">OrderId:ID:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspName:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspApplytime:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSpec:&nbsp&nbsp&nbsp&nbsp&nbsp&nbspQty:&nbspUnit price:&nbsp&nbsp&nbspDiscount:&nbsp&nbsp&nbspSalesman:&nbsp&nbspCompany:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspReamrks:</font></font></font></br>';
while($rs=mysql_fetch_array($result)){ 
	echo '<font face="Times New Roman">',$rs['OrderID'],'&nbsp&nbsp',$rs['ID'],'&nbsp&nbsp',$rs['Agentsname'],'&nbsp&nbsp',$rs['Applytime'],'&nbsp&nbsp',$rs['Agentsize'],'&nbsp&nbsp',$rs['AgentNum'],'&nbsp&nbsp',$rs['SinglePrize'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',$rs['Discount'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',$rs['Saler'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',$rs['Company'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',$rs['Remarks'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</br>Status</font></br>';
	$imd= $rs['OrderID'];
    $com=mysql_query("select * from think_checkapp where OrderID = '$imd' ");
    // if($com){
    // 	echo '11';
    // }
      while($rs2=mysql_fetch_array($com)){
      	 echo '<font face="Times New Roman">',$rs2['CheckID'],'&nbsp&nbsp<font color=red>',$rs2['status'],'</font>&nbsp&nbsp',$rs2['comment'],'</font></br>';
      }
      echo '</br>';
}
}
else{
	// echo $oID;
	// $result2="select * from think_apply where OrderID='$oID' ";
	$result=mysql_query("select * from think_apply where OrderID='$oID' ");
	$fr = mysql_fetch_array($result);
	// echo $result2;
	if(!$fr){
		echo '<font color=#000000><font size=3><font face="Times New Roman">Wrong OrderID, Please Click <a href=feedbackrequest.php><font color=red>here</font></a> to come back and recheck.</font></font></font>';
		exit;
	}
	echo '<font color=#00629b><font size=2><font face="Times New Roman">OrderId:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspID:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspName:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspApplytime:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSpec:&nbsp&nbsp&nbsp&nbsp&nbsp&nbspQty:&nbspUnit price:&nbsp&nbsp&nbspDiscount:&nbsp&nbsp&nbspSalesman:&nbsp&nbspCompany:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspReamrks:</font></font></font></br>';

	// echo 'dd';
	echo '<font face="Times New Roman">',$fr['OrderID'],'&nbsp&nbsp',$fr['ID'],'&nbsp&nbsp',$fr['Agentsname'],'&nbsp&nbsp',$fr['Applytime'],'&nbsp&nbsp',$fr['Agentsize'],'&nbsp&nbsp',$fr['AgentNum'],'&nbsp&nbsp',$fr['SinglePrize'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',$fr['Discount'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',$fr['Saler'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',$fr['Company'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',$fr['Remarks'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</br>Status</br></font>';
	$imd= $fr['OrderID'];
    $com=mysql_query("select * from think_checkapp where OrderID = '$imd' ");
    // if($com){
    // 	echo '11';
    // }
      while($rs2=mysql_fetch_array($com)){
      	 echo '<font face="Times New Roman">',$rs2['CheckID'],'&nbsp&nbsp<font color=red>',$rs2['status'],'</font>&nbsp&nbsp',$rs2['comment'],'</font></br>';
      }
      echo '</br>';


}
}
// print_r($apptime);
// // $checkre = $_POST['check'];
// for ($i=0; $i<count($appid); $i++){
// 	$appidse=$appid[$i];
// 	$apptimese=$apptime[$i];
// 	$checkrein=$checkre[$i];
// 	// echo $checkrein;
// 	$sqlup="UPDATE think_apply SET checkapply='$checkrein', CheckID='$checkid' WHERE ID='$appidse' and Applytime='$apptimese' ";
// 	// echo $sqlup;
// 	if(mysql_query($sqlup)){
// 		echo '<font face="Times New Roman">Request<font color=red> ',$i+1, ' </font>has been updated</font></br>';
// 	}
// }
echo '</br><font face="Times New Roman"><font color=red>If and Only if you got three positive response from three advisors, you can proceed to order reagents.</font></br>Please Click <a href=feedbackrequest.php><font color=red>here</font></a> to come back.</font>';
include('disconnectDB.php');
// print_r($appid);
?>