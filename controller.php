<?php
include('class_lib.php');

 if($_POST['method'] == "Login"){
	 $login = new database;
	 $columns = array("id","f_name", "l_name", "secruitycode");
	 //$where = array("username"=> "admin" ,"password" => "123");
	 $where = array("username"=> $_POST['username'] ,"password" => md5($_POST['userpassword']));
	 /*$orderBy = array();*/
	 $orderBy = array();
	 $wherestyle = "=";
	 $limit = array(20);
	 $login->set_lazy_select($db,"userinfo",$columns,$where,$orderBy,$limit,$wherestyle);
	 $login->lazy_select();
}

 if($_POST['method'] == "displayProducts"){
	 $prdocuts = new database;
	 $columns = array("id","product_name", "product_description", "price", "amount", "category", "sale", "dateupdated","image");
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

	 if($_POST['orderby'] == "")
	 {
		 $orderBy = array();
	 }else{
		 $orderBy = array($_POST['orderby']);
	 }

	 if($_POST['wherestyle'] == "")
	 {
		 $wherestyle = "=";
	 }else{
		 $wherestyle = $_POST['wherestyle'];
	 }
	 $prdocuts->set_lazy_select($db,"inventory",$columns,$where,$orderBy,$limit,$wherestyle);
	 $prdocuts->lazy_select();
}

 if($_POST['method'] == "searchBar"){
	 $querey = "SELECT COUNT(*) FROM inventory WHERE product_name LIKE '%".$_POST['searchname']."%';";
	 $statement = $db->prepare($querey);
	 $statement->execute();
	 $result = $statement->fetchColumn();
	 Print($result);
}

 if($_POST['method'] == "transactionComplete"){
   $transaction = new database;
   $insertValue = array("items" => $_POST['items'], "amounts" => $_POST['total']);
   $transaction->set_lazy_insert($db,"transaction",$insertValue);
   $transaction->lazy_insert();
}

if($_REQUEST['method'] == "getProducts"){
  $prdocuts = new database;
  $columns = array("id","product_name", "product_description", "price", "amount", "category", "sale", "dateupdated","image");
  $prdocuts->set_lazy_select($db,"inventory",$columns,array(),array(),array(),"=");
  $prdocuts->lazy_select();
}

if($_POST['method'] == "updateProduct"){
    $update = new database;
    $updateValue = array("product_name" =>  $_POST['product_name'], "product_description" => $_POST['product_description'],"price" => $_POST['price'],"amount" => $_POST['amount'],"image" => $_POST['image']);
    $where = array("id"=> $_POST['id']);
    $update->set_lazy_update($db,"inventory",$updateValue,$where);
    $update->lazy_update();
  }

?>
