<?php
include('connection.php');

 class database
 {	 
	/* public function insertStuff($tablename, $column, $value)
	 {
		 global $db;
		 $query ="INSERT INTO ".$tablename."(".$column.") VALUES ('".$value."')";
		 $result = $db->query($query);
		 if($result)
		 {
			 echo "success11111111";
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
			echo "success2222222222"; 
		 }

	 }*/
	 
	 public $db;
	 public $tablename = "tablename";
	 public $columns = "columns";
	 public $where = "where";
	 
	 public function set_lazy_select($db,$tablename,$columns,$where)
	 {
		 $this->db = $db;
		 $this->tablename = $tablename;
		 $this->columns = $columns;
		 $this->where = $where;
	 }
	 
	 public function lazy_select() //Super Lazy For all database select 
	 {
		 $db = $this->db;
		 $tablename = $this->tablename;
		 $columns = $this->columns;
		 $where = $this->where;
		 $querey ="SELECT ";
		 $arrlength = count($columns);
		 if($arrlength == 0 )
		 {
			echo "no columns"; 
			$querey ="SELECT * ";
		 }else
		 {
			 $selecCount = 0;
			 for($x = 0; $x <$arrlength; $x++)
			 {
				 $selecCount ++;
				 $querey = $querey . $columns[$x] . " ";
				 if($selecCount >=1 && $selecCount < $arrlength)
				 {
					 $querey = $querey . ", ";
				 }
			 }
		 }
		 echo $querey;
		 
		 
		 echo "<br>";
		 $querey = $querey . "FROM ". $tablename;
		 echo "<br>";
		 echo $querey;
		 echo "<br>";
		 $arrlengthWhere = count($where);
		 echo $arrlengthWhere;
		 echo "<br>";
		 if($arrlengthWhere == 0 )
		 {
			 $statement = $db->prepare($querey);
			 $statement->execute();
			 
		 }else
		 {
			 $querey = $querey . " WHERE "; 
			 $whereCount = 0;
			 foreach($where as $i => $i_value) {
				$whereCount++;
				$querey = $querey . " " . $i . " = " . ":" . $i. " ";
				if($whereCount >= 1 && $whereCount < $arrlengthWhere)
				{
					$querey = $querey . " AND ";
				}	
			 }
			 echo "<br>";
			 echo $querey;
			 echo "<br>";
			 $excuseQuerey = "";
			 $whereCountSecondEach = 0;
			 $executeArray = array(); 
			 foreach($where as $z => $z_value) {
				$excuseQuerey = $excuseQuerey .  "':" . $z . "' => '" . $z_value ."'";
				$whereCountSecondEach ++;
				if($whereCountSecondEach >= 1 && $whereCountSecondEach < $arrlengthWhere)
				{
					$excuseQuerey = $excuseQuerey . " , ";
				}
				$executeArray[":".$z.""] = "".$z_value."";
			 }
			 echo "<br>";
			 var_dump($executeArray);
			 echo "<br>";
			 echo "<br>";
			 echo $excuseQuerey;
			 echo "<br>";
			 $statement = $db->prepare($querey);
			 $statement->execute($executeArray);
		 }
		 
		
		 $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		 $count = $statement->rowCount();
		 
		 echo $count;
		 var_dump($rows);
		 if($count>0)
		 {
			echo "success"; 
		 }else
		 {
			echo "failed" . "<br>"; 
		 }
		 
		 
	 }
	 
 }
 
/* $conn = new database;
 $conn -> selectStuff($db,"userinfo","admin","123");*/
 
 
 
 $test = new database;
// $columns = array(f_name, l_name, secruitycode);
 $columns = array();
/* $where = array("username"=> "admin","password" =>"123");*/
 $where = array();
 $test->set_lazy_select($db,"userinfo",$columns,$where);
 $test->lazy_select();
 
/* 
  Class Rule
  - $db is from
  
	try{
		$db = new PDO("mysql:dbname=databasename;host=localhost", "username", "password");
	} catch (PDOExceptioin $e){
		echo 'Connection Failed: ' . $e->getMessage();	
	}
	
  - set_lazy_select ($db, $tablename, $columns, $where);
  - If you want to select all the columns from your database, create an empty array for $columns
  - 
*/
?>

