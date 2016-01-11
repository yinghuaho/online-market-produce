<?php
include("connection.php");

 class database
 {	 
	 public function insertStuff($tablename, $column, $value)
	 {
		 global $db;
		 $query ="INSERT INTO ".$tablename."(".$column.") VALUES ('".$value."')";
		 $result = $db->query($query);
		 if($result)
		 {
			 echo "success";
		 }
	 }
	 
	 public function selectStuff($db,$tablename, $username, $password)
	 {

		 $statement = $db->prepare("SELECT f_name, l_name, secruitycode FROM ".$tablename." WHERE username = :username AND password = :password ");
		 $statement->execute(array(':username' => $username, ':password' => $password));
		 $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		 $count = $statement->rowCount();
		 if($count>0)
		 {
			echo "success"; 
		 }

	 }
	 
 }
 
 $conn = new database;
 $conn -> selectStuff($db,"userinfo","admin","123");
?>