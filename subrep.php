<?php
session_start();
include('connectDB.php');
// header ("connect-type:test/html;charset=utf8_bin");
date_default_timezone_set("Asia/Shanghai");
$nowtime = date("Y-m-d H:i:s");
$id = $_SESSION['user']['uid'];
// echo $id;
$tt = date("YmdHis");
$ddl = $_POST['ddl'];
$ddl_std = $ddl.' 20:00:00';
// echo $ddl_std,$nowtime;
if($ddl_std < $nowtime){
	echo 'The chosen deadline has passed, please click <a href="subreport.php"><font color=red>here</font></a> to go back, <font color=red>refresh</font> and repick!';
	exit;
}
$orire=mysql_query("select * from think_file WHERE ID='$id' and subtime='$ddl' limit 1");
$flag = mysql_fetch_array($orire);
$find = mysql_query("select * from think_file WHERE ID='$id' limit 1");
// if(!$flag){
// 	echo 'NO';
// }
// echo '$ddl';
$report = $_FILES['report'];
$repp = $report['name'];
// echo $repp;
$reportype = $report['type'];
$reportsize = $report['size'];
// echo $reportsize;
$suc = explode('.',$repp);
$succ = $suc[count($suc)-1];
chdir('./reports');
if(!file_exists($ddl)){
	mkdir ($ddl,0777,true);
}
$repdir = $id.$tt.'.'.$succ;
// echo $repdir;
if($report['size'] > 10000000){
	echo 'Report too large!';
	exit;
}
if (file_exists($repdir)){
	echo 'Report Already exists.</br>';
	exit;
}
else{
	if(move_uploaded_file($report['tmp_name'],"./$ddl/".$repdir)){;
		echo 'Report <font color=red>successfully</font> uploaded</br>';
		$addres = "./$ddl/".$repdir;
		// echo $addres;
		// echo '<img src='$uploadfile'>';
}
else{
	echo 'Report failed to upload, please contact admin.';
	exit;
}
}
// echo $flag;
if($flag){
	 // echo '1';
  $del = mysql_query("select FileAddres from think_file WHERE ID='$id' and subtime='$ddl' ");
  $dell = mysql_fetch_array($del);
  $del_resu = $dell['FileAddres'];
   // echo $del_resu;
  $sql = "UPDATE think_file SET FileAddres='$addres',realuptime='$nowtime',FileName='$repp',Filesize='$reportsize' WHERE ID='$id' and subtime='$ddl' ";
   // echo $sql;
  if(mysql_query($sql)){
	echo'New Report has been <font color=red>successfully updated</font>!</br>';
	 if(unlink($del_resu)){
  	echo 'Your last report of this deadline has been <font color=red>deleted</font>!</br></br><font face="Times New Roman">Please click <a href="subreport.php"><font color=red>Here</font></a> to go back.</font></br>';
     }
    else{
   	echo 'Failed to remove latest report.</br>';
     }
 }
 else {
 	echo '<font face="Times New Roman"><font color=red>Failed</font> to add into databases, please contact admin.</br>Click <a href="subreport.php"><font color=red>Here</font></a> to go back</font>';
 }
}
else{
$sql = "INSERT INTO think_file (ID,subtime,FileName,realuptime,FileAddres,Filesize)VALUES('$id','$ddl','$repp','$nowtime','$addres','$reportsize') ";
// echo $sql;
if(mysql_query($sql)){
	echo 'Report has been <font color=red>successfully stored</font>!</br>Please click <a href="subreport.php"><font color=red>Here</font></a> to go back';
}
else{
	echo '<font color=red>Failed</font> to store reports, please contact admin!</br>Please click <a href="subreport.php"><font color=red>Here</font></a> to go back';
}
}
// echo 'dadadad';
// if(mysql_fetch_array($find)){
// 	echo '1';
// 	$upchange=mysql_query("UPDATE think_search SET subtime='$ddl',realtime='$nowtime' ");
// }
// else{
//    echo'2';
//    $pre = "INSERT INTO think_search(ID,subtime,realtime)VALUES('$id','$ddl','$nowtime') ";
//    if(mysql_query($pre)){
// 	echo 'lallal';
// 	// $upchange=mysql_query("UPDATE think_search SET subtime='$ddl',realtime='$nowtime' ");
// }
// }
	// echo'123131';
// $pre = "INSERT INTO think_search(ID,subtime,realtime)VALUES('$id','$ddl','$nowtime') ";
// echo $pre;
// if(mysql_query($pre)){
// 	echo 'lallal';
// }

?>