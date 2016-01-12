ooi<?php
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
	 
	 function selectStuff($db,$tablename, $username, $password)
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
	 
	 public $db;
	 public $tablename;
	 public $columns;
	 public $where;
	 
	 public function set_lazy_select($db,$tablename,$columns,$where)
	 {
		 $this->db = $db;
		 $this->tablename = $tablename;
		 $this->columns = $columns;
		 $this->where = $where;
	 }
	 
	 public function lazy_select() //Super Lazy For all database reading
	 {
			return $this->db . "<br />";
	 }
	 
 }
 
 $conn = new database;
 $conn -> selectStuff($db,"userinfo","admin","123");
 $test = new database;
 $test->set_lazy_select($db,"table","columns","where");
 echo $test->lazy_select();
 //
?>