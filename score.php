<?php 
session_start () ;
if (!isset ($_SESSION['user'])){
	header("refresh:5;url=login.html");
echo '<font size=4>You need to log in first, the page will automatically be into login page in 5 seconds.</br>If not, please click <a href="login.html"><font color="red">here</font> </a>to login.</font>' ;
exit () ; 
 } 
 else {
 	if($_SESSION['user']['auth']<2){
 		header("refresh:5;url=logout.php");
echo '<font size=4><font face="Times New Roman">You have no authority, please log out and change an account, you will automatically be logged out in 5 seconds.</br>If not, please click <a href="logout.php"><font color="red">here</font> </a>.</font></font>' ;
exit();
 	}
 }
 // else{
 // 	// echo '<a href="logout.php">LOGOUT</a>';
 //    $uname=$_SESSION['user']['uname'];
 //    echo $uname;
 // }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<script language="JavaScript">
	function Switch(){
    document.getElementById('edit_info').style.display = document.getElementById('edit_info').style.display=='none'?'block':'none';
}
</script>
<script language="JavaScript">
	function Switch2(){
    document.getElementById('file').style.display = document.getElementById('file').style.display=='none'?'block':'none';
}
</script>
<script language="JavaScript">
	function Switch3(){
    document.getElementById('inventory').style.display = document.getElementById('inventory').style.display=='none'?'block':'none';
}
</script>
<script language="JavaScript">
	function Switch4(){
    document.getElementById('other').style.display = document.getElementById('other').style.display=='none'?'block':'none';
}
</script>
<script language="javascript">
    function GetImage(){
    var adrs= $imaa;
    document.images.imagenit.src="./image/exp.jpg";
}
</script>
<script language="JavaScript">
	function Inputcheck(Report){
		 // var e_check = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
		// if((LoginForm.username.value.length<3)||(LoginForm.username.value.length)>15){
		// 	alert("Username shoule be 3-15 words!");
		// 	return false;
		// }
		if(Score.ddl.value==""){
			alert("Please choose the date of this report!");
			return false;

		}
		if(Score.student.value==""){
			alert("Please choose the student ID");
			return false;
		}
		if((Score.score.value=="") && (Score.comments.value=="")) {
			alert("You haven't score/comment anything!");
			return false;
		}
        if((Score.score.value>10) || (Score.score.value<0)){
			alert("The score shoule be in 0-10, with accuracy of 1 decimal point!");
			return false;
		}
		if(Score.comments.value.length>100){
			alert("The comments should be within 100 words.");
			return false;
		}
		// if(Report.report.value=="") {
		// 	alert("Please choose a file!");
		// 	return false;
		// }

}
		
		// if(LoginForm.password.value!=LoginForm.confirm.value){
		// 	alert("Two password should be the same!");
		// 	return false;
		// }
		// if(!e_check.test(LoginForm.email.value)){
		// 	alert("Wrong email address format!");
		// 	return false ;
		// }
</script> 


<!-- <link rel="stylesheet" type="text/css" href="css/register.css" />  -->
<title>TEST Score Report Page</title>	
<style type="text/css">
a{text-decoration:none}
#bar{
        /*float: left;*/
        width:400px;
        height:100%;
        background:#8e9dac;
    }
#split{
        /*float: left;*/
        width:400px;
        height:8px;
        background:#2F4F4F;
    }
#head{
        /*float: left;*/
        width:100%;
        height:126px;
        background:#334d02;
    }
/*#display: {
        
        width:30px;
        height:100%;
        background:#2F4F4F;
    }*/
</style>
</head>
<body>
<body bgcolor=#DCDCDC>
<body onload="GetImage()">
<div id="head" style="position: absolute;top:0px">
</div>
<div id="title" style="position: absolute;top:40px;left:420px;color:#faf5aa">
	<a href="mana.php"><font face="SimHei"><font size=6px><font color=#ddd782>Management&nbspSystem</font></font></font></a></br></br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color=#ddd782>System for lab-management</font>
</div>
<form name="Score" form method="post" action="scorrep.php" enctype="multipart/form-data" onsubmit="return Inputcheck(this)">  
<div id="prosettitle" style="position:absolute;top:140px;left:420px">
      <font face="Times New Roman"><font size=6><font color=#5e0e0e>Score Report</font></font></font></br>
</div>
<div id="word" style="position: absolute;top:200px;left:480px">
	<!-- THIS IS FOR TEST -->
  &nbsp&nbsp&nbsp&nbsp <font color=#3e5f17><font size=4><font face="Times New Roman"><?php
    $uid=$_SESSION['user']['uid'];
    $uname=$_SESSION['user']['uname'];
    echo 'ID:&nbsp&nbsp',$uid;
    echo '</br>&nbsp&nbsp&nbsp&nbsp&nbsp';
    echo 'Username:&nbsp&nbsp',$uname;
    ?></font></font></font></br>
    
<span style="white-space:pre">        </span>   
<li><font size=4><font color=#a9484e><font face="Times New Roman">Date:</font></font></font></br></li> <li><input name="ddl" type="date"/></li><font size=2><font color=#96343b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<u>Only Deadline</u> of this report(usually Sunday) is legal</br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp(e.g. 2017.10.29 is the deadline, then you should choose <u>exactly 2017.10.29</u>; 2017.10.28 or day before that would be illegal.</font></font>
</br></br>



<li><font size=4><font color=#a9484e><font face="Times New Roman">Student ID:</font></font></font></br></li> <li><select name="student">
	<option value=""></option>
    <?php
    include("connectDB.php");
    $result2=mysql_query("select distinct(ID) as stud from think_file");
    include("disconnectDB");
while($rs=mysql_fetch_array($result2)){  
    ?>  
    <option value="<?php echo $rs['stud'];?>"><?php echo $rs['stud'];?></option>  
    <?php  
}  
?>  

</select>
</li></br>
<div id='splitbar' style="width:100%; height:20px; position: absolute; background-color: #b8a9ad; text-align: center;">
<font size=3><font color=#5e0621><font face="Times New Roman">The following are scoring items</font></font></font>
</div></br></br>
<li><font size=4><font color=#a9484e><font face="Times New Roman">Score:</font></font></font></br></li> <li><input name="score" type="text"/></li><font size=2><font color=#000000><font face="Times New Roman">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspThe score is in a range of 0-10, with accuracy of 1 decimal point.(e.g. 9.6)</font></font></font>
<li><font size=4><font color=#a9484e><font face="Times New Roman">Comments:</font></font></font></br></li> <li><input name="comments" style="width:500px;height:100px" type="text" placeholder="Max: 100 words" /></li>
<font size=2><font color=#000000><font face="Times New Roman">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp*The score and comments can be edited, only the latest version will be avaliable to students.</font></font></font></br></br>
<!-- <li><font size=4><font color=#a9484e><font face="Times New Roman">Report:</font></font></font></br></li> <li><input name="report" type="file"/></li><font size=2><font color=#96343b>Max size:10M</font></font>
</br></br></br>
<font size=2><font face="Times New Roman">*You can upload again if you think the report needs modification, only the lastest version will be counted, just remember to submit it before Sunday.</font></font></br></br> -->
<div id=sub style="height:100px">
   <input style="width:80px;height:22px;border:#E6E6FA 1px solid;background:#334d02;color:#FFFFFF" input type="reset" value="Reset" />  
<span style="white-space:pre">            </span>  <input style="width:80px;height:22px;border:#E6E6FA 1px solid;background:#334d02;color:#FFFFFF" input type="submit" value="Submit" />  
	</div>
</div>
</form>


<div id="log" style="position:absolute;right:30px;top:90px">
	<?php
	if(isset($_SESSION['user'])){
		//$uname=$_SESSION['user']['uname'];
		// $uid=$_SESSION['user']['uid'];
        include('connectDB.php');
        $sqlima = mysql_query("select * from think_profile where ID='$uid' ");
        $ima = mysql_fetch_array($sqlima);
        $imaa = $ima['Image'];
        // $immma = '99999920171030211245.png';
        include('disconnectDB.php');
         // echo $imaa;

	}
   echo '<font color=#f6f8ce><font size=2>Hi,',$uname,' / <a href="logout.php"><font color=#f6f8ce>Log out</font></a></font></font>';
   // echo $immma;
   // echo $imaa;
    // echo '<img src="./image/exp.jpg">';
   ?>
</div>
  <img src="<?php echo $imaa; ?>" id="imagenit" alt="" width=100px height=70px style="position:absolute;right:40px;top:10px"> 
<div id="bar" style="position:fixed;top:0px"></div>
<!-- <div id="split2" style="position:absolute;top:126px"></div> -->
<div id="log_inf" style="position: absolute;left:20px;top:20px;color:#F5F5F5;font-family: Times New Roman">
	<?php
	if(isset($_SESSION['user'])){
		$uip=$_SESSION['user']['ulastlogip'];
		$utime=$_SESSION['user']['ulastlogtime'];
        $uid=$_SESSION['user']['uid'];
	}
      echo 'Last logged in IP:</br>',$uip,'</br>Last logged in at:</br>',$utime;
	?>
    <div id="log_exp" style="position: absolute;left:260px;top:70px;font-family: Times New Roman;color:#000000;width: 150px">
    [Log information]
</div>
</div>

<div id="split" style="position:absolute;top:120px">
	</div>
<!-- <div id="navi_exp" style="position: absolute;top:135px;left:16px">
	<font size=5>Function</font> -->
</div>
 <div id="navi_info" style="position: absolute;left:50px;top:200px; font-family: Times New Roman">
   <div id="edit_info_sw"><font size=5><font color=#FFFFFF>Edit information</font></font></div>
   <div id="edit_info" style="">
     <li><a href="editprofile.php"><font color=#FFFFFF>Edit Profile</font></a></li>
     <li><a href="editpassword.php"><font color=#FFFFFF>Edit password</font></a></li></br></br></div></div>
 <div id="navi_rep" style="position: absolute;left:50px;top:300px;font-family: Times New Roman">
    <div id="file_sw"><font size=5><font color=#FFFFFF>Report</font></font></div>
    <div id="file" style="">
     <li><a href="subreport.php"><font color=#FFFFFF>Submit report</font></a></li>
     <li><a href="downreport.php"><font color=#ede673>Download report</font></a></li>
    <li><a href="score.php"><font color=#ede673>Score</font></a></li>
     <li><a href="checkcomments.php"><font color=#FFFFFF>Check score and comments</font></a></li></br></br></div></div>
 <div id="navi_inven" style="position: absolute;left:50px;top:420px;font-family: Times New Roman">
    <div id="inven_sw" ><font size=5><font color=#FFFFFF>Lab inventory</font></font></div>
    <div id="inventory" style="">
     <li><a href="applyinven.php"><font color=#FFFFFF>Apply for reagent order</font></a></li>
   <li><a href="applycheck.php"><font color=#ede673>Check application request</font></a></li>
   <li><a href="feedbackrequest.php"><font color=#FFFFFF>Check request state</font></a></li>
   <li><a href="editinven.php"><font color=#FFFFFF>Edit inventory</font></a></li></br></br></div></div>
     <div id="navi_other" style="position: absolute;left:50px;top:550px;font-family: Times New Roman">
    <div id="other_sw" ><font size=5><font color=#FFFFFF>Others</font></font></div>
    <div id="other" style="">
     <li><a href="mana.php"><font color=#FFFFFF>exp1</font></a></li>
     <li><a href="mana.php"><font color=#FFFFFF>exp2</font></a></li></br></br></div></div>
<div id="bot" style="position:fixed;left:500px;bottom:0px;font-family:Times New Roman;color:#96a48b;background-color:#2F4F4F;text-align: center">This page is made for management-page test, contact Faust Hsu (molle_faust@hotmail.com) to get more information.</div>


</body>
?>