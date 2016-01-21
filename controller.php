<?php
include('class_lib.php'); 
 
 if($_POST['method'] == "Login"){
	 $login = new database;
	 $columns = array(f_name, l_name, secruitycode);
	 //$where = array("username"=> "admin" ,"password" => "123");
	 $where = array("username"=> $_POST['username'] ,"password" => $_POST['userpassword']);
	 $orderBy = array();
	 $login->set_lazy_select($db,"userinfo",$columns,$where,$orderBy);
	 $login->lazy_select();
}


 if($_POST['method'] == "productsOnSale"){
	 $prdocuts = new database;
	 $columns = array(id,product_name, product_description, price, amount, category, sale, dateupdated,image);
	 $where = array("sale"=> "true");
	 $orderBy = array();
	 $prdocuts->set_lazy_select($db,"inventory",$columns,$where,$orderBy);
	 $prdocuts->lazy_select();
}
?>