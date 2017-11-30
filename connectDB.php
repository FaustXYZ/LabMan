<?php
// header ("connect-type:test/html;charset=utf-8");

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

    // mysql_query("'set names 'UTF8'");
    mysql_query("set names 'utf8' ");
mysql_query("set character_set_client=utf8");
mysql_query("set character_set_results=utf8");
    
    ?>