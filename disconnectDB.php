<?php
// header ("connect-type:test/html;charset=utf8_bin");
     ob_end_flush();
    define('host','');
    define('username','');
    define('password','');

    $con = mysql_connect(host,username,password);
    // if(!$con){
    // 	die{"failed to connect: " . mysql_error()};
    // }
    // if($con) {
    //     echo 'PASS';
    // }
    mysql_select_db('TEST');

    mysql_query('set names utf8_bin');
    mysql_close($con);
    ?>