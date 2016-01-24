<?php
include('class_lib.php'); 
 
 if($_POST['method'] == "Login"){
	 $login = new database;
	 $columns = array(f_name, l_name, secruitycode);
	 //$where = array("username"=> "admin" ,"password" => "123");
	 $where = array("username"=> $_POST['username'] ,"password" => $_POST['userpassword']);
	 /*$orderBy = array();*/
	 $login->set_lazy_select($db,"userinfo",$columns,$where,$orderBy);
	 $login->lazy_select();
}


 if($_POST['method'] == "productsOnSale"){
	 $prdocuts = new database;
	 $columns = array(id,product_name, product_description, price, amount, category, sale, dateupdated,image);
	 $where = array("sale"=> "true");
	 //make variables post from html for category name
	 /*$orderBy = array();
	 $limit = array(20,$_POST['limit']);*/
	 $prdocuts->set_lazy_select($db,"inventory",$columns,$where,$orderBy);
	 $prdocuts->lazy_select();
}


 if($_POST['method'] == "displayProducts"){
	 $prdocuts = new database;
	 $columns = array(id,product_name, product_description, price, amount, category, sale, dateupdated,image);
	 //make variables post from html for category name
	 /*$orderBy = array();*/
	 if($_POST['limit'] == 0)
	 {
		 $limit = array(20);
	 }else{
		$limit = array(20,$_POST['limit']); 
	 }
	 
	 if($_POST['where'] == "")
	 {
		 $where = array();
	 }else{
		 $where = array($_POST['wherename']=>$_POST['where']);
	 }
	 $prdocuts->set_lazy_select($db,"inventory",$columns,$where,$orderBy,$limit);
	 $prdocuts->lazy_select();
}
?>