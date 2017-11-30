<?php
session_start () ;
$subtime = $_POST['ddl'];
$stuid = $_POST['student'];
$score = $_POST['score'];
$comm = $_POST['comments'];
// echo $comm;
$commID = $_SESSION['user']['uid'];
$ddl_std = $subtime.' 20:00:00';
date_default_timezone_set("Asia/Shanghai");
$nowtime = date("Y-m-d H:i:s");
if ($nowtime <= $ddl_std){
echo 'The chosen deadline has not closed, please click <a href="score.php"><font color=red>here</font></a> to go back, <font color=red>refresh</font> and repick!';
	exit;
}
// echo $commID;
include("connectDB.php");
// echo $score;
// maybe add where ID=$stuid
echo $subtime;
$timecheck = mysql_query("select * from think_file where subtime='$subtime'");
// echo $timecheck;
if(!mysql_fetch_array($timecheck)){
   echo 'There is no record of this date, please click <a href="score.php"><font color=red>here</font></a> to go back and repick.';
   exit;
}
$check = mysql_query("select * from think_comment where subtime='$subtime' and stuID='$stuid' and commID='$commID' ");
if($score==""){
  $news=mysql_fetch_array(mysql_query("select score from think_comment where subtime='$subtime' and stuID='$stuid' and commID='$commID'"));
  $newscore=$news['score'];
}
else{
  // echo 'kkk';
  $newscore=$score;
}
// echo $newscore;
if($comm==""){
  $newc=mysql_fetch_array(mysql_query("select comments from think_comment where subtime='$subtime' and stuID='$stuid' and commID='$commID'"));
  $newcomm=$newc['comments'];
}
else{
  // echo 'lll';
   $newcomm=$comm;
}
// echo $newscore;
if(mysql_fetch_array($check)){
  // echo '...';
   $upda=mysql_query("UPDATE think_comment SET score='$newscore',comments='$newcomm' where stuID='$stuid' and subtime='$subtime' and commID='$commID'");
    // echo $upda;
   if($upda){
    echo '<font face="Times New Roman">Score and comments have been updated!</br>Click <a href=score.php><font color=red>here</font></a> to go back.</font>';
   }
}
else{
  $inse=mysql_query("INSERT INTO think_comment (commID,stuID,score,comments,subtime,commtime)VALUES('$commID','$stuid','$score','$comm','$subtime','$nowtime')");
  if($inse){
    echo '<font face="Times New Roman">Score and comments have been upload!</br>Click <a href=score.php><font color=red>here</font></a> to go back.</font>';
  }
}
// $commcheck = mysql_query("select comments from think_comment where subtime='$subtime' and stuID='$stuid' and commID='$commID' ");
// if($score!=""){
//    if(mysql_fetch_array($scorecheck)){
//      $upsco=mysql_query("UPDATE think_comment SET score='$score' where stuID='$stuid' and subtime='$subtime' and commID='$commID'");
//    }
//    else{
//     $flagsco=1;
//    }
//  if($comm!=""){
//    if(mysql_fetch_array($commcheck)){
// 	 $upcomm=mysql_query("UPDATE think_comment SET comments='$comm' where stuID='$stuid' and subtime='$subtime' and commID='$commID'");
// }
//    else{
//     $flagcomm=1;
//   }
// if ($flagsco==1){
//   if($flagcomm==1){
//  $insco=mysql_query("INSERT INTO think_comment(commID,stuID,score,comments,subtime,commtime)VALUES('$commID','$stuid','$score','$comments','$subtime','$nowtime')");
// }
// }
?>