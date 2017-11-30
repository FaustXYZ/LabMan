<?php
session_start();
// header ("connect-type:test/html;charset=utf8_bin");
date_default_timezone_set("Asia/Shanghai");
$nowtime = date("Y-m-d H:i:s");
$id = $_SESSION['user']['uid'];
$name = $_POST['invenrea'];
$spec = $_POST['invensiz'];
$qty = $_POST['number'];
$site = $_POST['storage'];
$act = $_POST['action'];
include('connectDB.php');
$check = mysql_query("select * from think_reagent where Name='$name' and Size='$spec' and Store='$site' ");
$storenum = mysql_fetch_array($check);
// print_r($storenum);
if($act=="fetch"){
     if(!$storenum ){
	echo '<font face=Times New Roman>Cannot find<font color=red> ',$spec,'&nbsp',$name,'</font> in <font color=red>',$site,'</font>, please click <a href="editinven.php"><font color=red>HERE</font></a> to go back and re-enter</font>';
	exit;
   }

   elseif($storenum['Number']<$qty){
	echo '<font face=Times New Roman>The Qty you demand is larger than storage, please click <a href="editinven.php"><font color=red>HERE</font></a> to go back and re-enter</font>';
	exit;
}
   else{
   	$newqty = $storenum['Number']-$qty;
    // echo $newqty;
    $edit = mysql_query("UPDATE think_reagent SET Number='$newqty', Lasttime='$nowtime' where Name='$name' and Size='$spec' and Store='$site'");
    if($edit){
      $act_inven = mysql_query("INSERT INTO think_editin (ID,Edtime,Reagent,Number,Store,Size,action)VALUES('$id','$nowtime','$name','$qty','$site','$spec','$act')");
      if($act_inven){
        echo '<font face=Times New Roman>Inventory edited successfully, <font color=red>',$qty,'&nbsp',$name,' </font>has been fetched from<font color=red> ',$site,'</font>.</br>please click <a href="editinven.php"><font color=red>HERE</font></a> to go back.</font>';
      }
    }
   }
}
if($act=='deposit'){
    if(!$storenum ){
      // echo '2';
     $add = mysql_query("INSERT INTO think_reagent(Name,Size,Store,Number,Lasttime)VALUES('$name','$spec','$site','$qty','$nowtime')");
     if($add){
      echo '<font face=Times New Roman>Inventory edited successfully, <font color=red>',$qty,'&nbsp',$name,' </font>has been deposited into<font color=red> ',$site,'</font>.</br>please click <a href="editinven.php"><font color=red>HERE</font></a> to go back.</font>';
     }
   }
   else{
    $newqty = $storenum['Number']+$qty;
     $edit = mysql_query("UPDATE think_reagent SET Number='$newqty', Lasttime='$nowtime' where Name='$name' and Size='$spec' and Store='$site'");
     if($edit){
      $act_inven = mysql_query("INSERT INTO think_editin (ID,Edtime,Reagent,Number,Store,Size,action)VALUES('$id','$nowtime','$name','$qty','$site','$spec','$act')");
      if($act_inven){
        echo '<font face=Times New Roman>Inventory edited successfully, <font color=red>',$qty,'&nbsp',$name,' </font>has been added into<font color=red> ',$site,'</font>.</br>please click <a href="editinven.php"><font color=red>HERE</font></a> to go back.</font>';
      }
     }
   }
}
?>