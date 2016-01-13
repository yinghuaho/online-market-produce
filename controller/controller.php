<?php
include('class_lib.php');
 $test = new database;
 $columns = array(f_name, l_name, secruitycode);
 //$where = array("username"=> "admin" ,"password" => "123");
 $where = array("username"=> $_POST['username'] ,"password" => $_POST['userpassword']);
 $orderBy = array();
 $test->set_lazy_select($db,"userinfo",$columns,$where,$orderBy);
 $test->lazy_select();
?>