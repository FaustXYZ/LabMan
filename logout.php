<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');
    if(isset($_SESSION['user'])){
            session_unset();//free all session variable
            session_destroy();//销毁一个会话中的全部数据
            setcookie(session_name(),'',time()-3600);//销毁与客户端的卡号
            header("refresh:5;url=index.html");  
            echo '<font size=4><font face="Courier New"><font color=#696969>Successfully logged out, you will be back to home page in 5 seconds automatically, if not, you can click <a href="index.html"> <font color="red">here</font></a>.</font></font></font>';
       
        }else{
            header("refresh:5;url=index.html"); 
            echo '<font size=4><font face="Courier New"><font color=#696969>Failed to logged out, please wait and try again.</br>You will be back to management page in 5 seconds automatically, if not, you can click <a href="mana.php"><font color="red">here</font></a>.</font></font></font>';
        }
?>