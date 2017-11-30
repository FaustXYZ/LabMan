<?php
session_start();
include('connectDB.php');
date_default_timezone_set("Asia/Shanghai");
$nowtime = date("Y-m-d H:i:s");
$ddl = $_POST['ddl'];
 // echo $ddl;
$ddl_std = $ddl.' 20:00:00';
if ($nowtime <= $ddl_std){
echo 'The chosen deadline has not closed, please click <a href="downreport.php"><font color=red>here</font></a> to go back, <font color=red>refresh</font> and repick!';
	exit;
}
$search=mysql_query("select * from think_file WHERE subtime='$ddl' limit 1");
$count=mysql_query("select count(*) as cou from think_file WHERE subtime='$ddl' ");
$cou_res=mysql_fetch_array($count);
// echo $cou_res['cou'];
// echo $search;

if(!mysql_fetch_array($search)){
	echo 'There is no submission record of this date, please click <a href="downreport.php"><font color=red>here</font></a> to go back, <font color=red>refresh</font> and repick!';
	exit;
}
// chdir('./reports');
$downdir = './reports/'.$ddl;
// $downdir='./useless/';
// echo $downdir;
// echo $downdir;
function addFileToZip($downdir,$zip){
	// echo $downdir;
	$handler=opendir($downdir);
	// if ($handler){
	// 	echo 'tt';
	// }
	while(($filename=readdir($handler))!=false){
		if($filename!='.' && $filename!='..'){
			if(is_dir($downdir.'/'.$filename)){
				addFileToZip($downdir.'/'.$filename,$zip);
			}
			else{
				$zip->addFile($downdir.'/'.$filename);
			}
		}
	}
 @closedir($downdir);
}
$zip = new ZipArchive();
$zipname=$ddl.'.zip';
// $zipname='./useless'.'.zip';
if($zip->open($zipname,ZipArchive::CREATE)){
	addFileToZip($downdir,$zip);
	$zip->close();  
}
// $filesize = filesize($zipname);
echo 'Click <a href="downrep.php?action=download">here</a> to continue download';
// echo $filesize;
header("Cache-Control: public"); 
header("Content-Description: File Transfer"); 
header('Content-disposition: attachment; filename='.$zipname);
header('Content-Type: application/zip');  
header("Content-Transfer-Encoding: binary"); 
header('Content-Length: '.filesize($zipname));
ob_clean();
flush();
@readfile($zipname);
unlink($zipname);
include("disconnectDB.php");

// $data = file_get_contents($zipname);
// readfile($data);  

// header("Cache-Control: public"); 
// header("Content-Description: File Transfer"); 
// header('Content-disposition: attachment; filename='.basename($zipname));  
// header("Content-Type: application/zip"); //zip格式的  
// header("Content-Transfer-Encoding: binary"); //告诉浏览器，这是二进制文件  
// header('Content-Length: '. filesize($zipname)); //告诉浏览器，文件大小  
// readfile($zipname);


// downfile();
// unlink($zipname);
// readfile($zipname);
// $downdir='./reg.html';
// echo $downdir;
// echo $ddl;
// echo $filename;
// $zip = new ZipArchive();
// $zip->open($filename,ZipArchive::CREATE);
// $zip->addFile($downdir);
// $zip->close();
?>