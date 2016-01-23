<?php
include('connection.php');

 class database
 {	 	 
	 private $db;
	 private $tablename = "tablename";
	 private $columns = "columns";
	 private $where = "where";
	 private $orderBy = "orderBY";
	 private $limit ="";
	 private $updateValue = "";
	 private $insertValue = "";
	 
	 
	 public function set_lazy_select($db,$tablename,$columns,$where,$orderBy,$limit) //set varaibles for lazy_select() function
	 {
		 $this->db = $db;
		 $this->tablename = $tablename;
		 $this->columns = $columns;
		 $this->where = $where;
		 $this->orderBy = $orderBy;
		 $this->limit = $limit;
	 }
	 
	 public function lazy_select() //function supports all kind of database select function 
	 {
		 $db = $this->db;
		 $tablename = $this->tablename;
		 $columns = $this->columns;
		 $where = $this->where;
		 $orderBy = $this->orderBy;
		 $limit = $this->limit;
		 $querey ="SELECT ";
		 $arrlength = count($columns);
		 
		 if($arrlength == 0 )
		 {
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
		 $querey = $querey . "FROM ". $tablename;
		 $arrlengthWhere = count($where);
		 $arrlengthOrderBy = count($orderBy);
		 $lengthLimit = count($limit);
		 if($arrlengthWhere == 0 )
		 {
			 
			 if($arrlengthOrderBy != 0)
				 {
					$querey = $querey . " ORDER BY  ";
					 
					$oderByCount = 0;
					for($c = 0; $c <$arrlengthOrderBy; $c++)
					{
						 $oderByCount ++;
						 $querey = $querey . $orderBy[$c] . " ";
						 if($oderByCount >=1 && $oderByCount < $arrlengthOrderBy)
						 {
							 $querey = $querey . ", ";
						 }
					} 
				 }
				 
				 
			if($lengthLimit!= 0)
			 {
				 $querey = $querey . " LIMIT ";
				 $limitcount = 0;
				 for($l = 0; $l <$lengthLimit ; $l++)
				 {
					 $limitcount++;
					 $querey = $querey . $limit[$l] . " ";
					 if($limitcount >=1 && $limitcount < $lengthLimit)
					 {
						 $querey = $querey . ", ";
					 }
				 }
			 }
			 
			 
			 $statement = $db->prepare($querey);
			 $statement->execute();
			 $arr = $statement->errorInfo();
/*			 if($arr)
			 {
		     print_r("database handling error".$arr);
			 }*/
			 
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
			 $executeArray = array(); 
			 foreach($where as $z => $z_value) {
				$executeArray[":".$z.""] = "".$z_value."";
			 }
			 
			 if($arrlengthOrderBy != 0)
			 {
				$querey = $querey . " ORDER BY  ";		 
				$oderByCount = 0;
				for($c = 0; $c <$arrlengthOrderBy; $c++)
				{
					 $oderByCount ++;
					 $querey = $querey . $orderBy[$c] . " ";
					 if($oderByCount >= 1 && $oderByCount < $arrlengthOrderBy)
					 {
						 $querey = $querey . ", ";
					 }
				} 
			 }		 
			 
			 if($lengthLimit!= 0)
			 {
				 $querey = $querey . " LIMIT ";
				 $limitcount = 0;
				 for($l = 0; $l <$lengthLimit ; $l++)
				 {
					 $limitcount++;
					 $querey = $querey . $limit[$l] . " ";
					 if($limitcount >=1 && $limitcount < $lengthLimit)
					 {
						 $querey = $querey . ", ";
					 }
				 }
			 }
			 $statement = $db->prepare($querey);
			 $statement->execute($executeArray);
			 $arr = $statement->errorInfo();
		 }	
		 $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		 $count = $statement->rowCount();
		 $result = array();


		 if($count>0)
		 {
			foreach($rows as $row){
				foreach($row as $key => $value)
				{
					$result_success[$key] = $value;				
				}
				$result_success["message"] = "success";
				array_push($result,$result_success);
			}
		 }else
		 {
			$result_failed = array("message" => "failed");
			array_push($result,$result_failed);
			/*if($arr)
			 { //to detect what sql code is wrong
			 print_r("database handling error".$arr);
			 }	*/	 
		 } 
		 echo json_encode($result);
	 }
 
/* $test = new database;
 //$columns = array(f_name, l_name, secruitycode);
 $columns = array();
 $where = array("username"=> "admin","password" =>"123");
 //$where = array();
 $limit = array(1,2);
 $orderBy = array(id); //("column_name DESC or ASC or leave it blank")
 $test->set_lazy_select($db,"userinfo",$columns,$where,$orderBy,$limit);
 $test->lazy_select();
 
  $test = new database;
 //$columns = array(f_name, l_name, secruitycode);
 $columns = array();
 $where = array();
 $limit = array();
 $orderBy = array(id); //("column_name DESC or ASC or leave it blank")
 $test->set_lazy_select($db,"userinfo",$columns,$where,$orderBy,$limit);
 $test->lazy_select();
*/ 



/* 
  Class Rule
  - $db is from connection.php as pdo function	
  - set_lazy_select ($db, $tablename, $columns, $where);
  - If you want to select all the columns from your database, create an empty array for $columns
  - If you don't want to have any "where statment", create an empty array for $where
  
  - $columns = array(f_name, l_name, secruitycode);  array(column1,column2,column3,...);
  - $where = array("username"=> "admin","password" =>"123"); array( column_name => value);
  - $orderBy = array(id);  array("column_name DESC or ASC or leave it blank")
  - $test->set_lazy_select($db,"userinfo",$columns,$where,$orderBy);   
   //set_lazy_select($db,$tablename,$columns,$where,$orderBy)
  - $test->lazy_select();  
*/

	 public function set_lazy_insert($db,$tablename,$insertValue) //set varaibles for lazy_insert() function
	 {
		 $this->db = $db;
		 $this->tablename = $tablename;
		 $this->insertValue = $insertValue;
	 }
	 
	 public function lazy_insert()//insert function nfor all database input
	 {
		 $db = $this->db;
		 $tablename = $this->tablename;
		 $insertValue = $this->insertValue;
		 $querey ="INSERT INTO ";
		 $querey = $querey . $tablename . "(";
		 $arrlength = count($insertValue);
		 $whereCount = 0;
		 foreach($insertValue as $i => $i_value )
		 {
			 $whereCount++;
			 $querey = $querey . " " . $i;
			 if($whereCount >= 1 && $whereCount < $arrlength)
			 {
				 $querey = $querey . ",";
			 }
		 }
		 $querey = $querey . ") VALUES (";		 
		 $whereCountValue = 0;
		 foreach($insertValue as $z => $z_value )
		 {
			 $whereCountValue++;
			 $querey = $querey . ":" . $z;
			 if($whereCountValue >= 1 && $whereCountValue < $arrlength)
			 {
				 $querey = $querey . ",";
			 }
		 }
		 $querey = $querey . ")";
		 $executeArray = array(); 
			 foreach($insertValue as $z => $z_value) {
				$executeArray[":".$z.""] = "".$z_value."";
			 }
		 $statement = $db->prepare($querey);
		 $result = array();
		 if ($statement->execute($executeArray))
		 {
			$result_success = array("message" => "success");
			array_push($result,$result_success);		 
		 } else
		 {
			 $arr = $statement->errorInfo();
			 array_push($result,$arr);
		 }
		 echo json_encode($result);
	 }
/*   $test = new database;
   $insertValue = array("username" => "Admin_2", "password" => "123456", "f_name" => "asdasd", "l_name" => "asdcad", "email" => "123456@", "usertype" => "admintest", "secruitycode" => "1234asdadsd56");
   $test->set_lazy_insert($db,"userinfo",$insertValue);
   $test->lazy_insert();*/
   
   	 public function set_lazy_delete($db,$tablename,$where) //set varaibles for lazy_insert() function
	 {
		 $this->db = $db;
		 $this->tablename = $tablename;
		 $this->where = $where;
	 }
	 
	 public function lazy_delete()
	 {
		 $db = $this->db;
		 $tablename = $this->tablename;
		 $where = $this->where;
		 $querey ="DELETE FROM ";
		 $querey = $querey . $tablename . " WHERE ";
		 $arrlength = count($where);
		 $whereCount = 0;
		 foreach($where as $i => $i_value )
		 {
			 $whereCount++;
			 $querey = $querey . " " . $i . " = " . ":" .$i;
			 if($whereCount >= 1 && $whereCount < $arrlength)
			 {
				 $querey = $querey . " AND ";
			 }
		 }
		 
		 $executeArray = array(); 
			 foreach($where as $z => $z_value) {
				$executeArray[":".$z.""] = "".$z_value."";
		  }
		  
		 $statement = $db->prepare($querey);
		 $result = array();
		 if ($statement->execute($executeArray))
		 {
			$result_success = array("message" => "success");
			array_push($result,$result_success);		 
		 } else
		 {
			 $arr = $statement->errorInfo();
			 array_push($result,$arr);
		 }	 
		 echo json_encode($result); 
	 }
 
/*  $test = new database;
  $where = array("username"=> "admin","password" =>"123");
  $test->set_lazy_delete($db,"userinfo",$where);
  $test->lazy_delete();*/
  
  
     public function set_lazy_update($db,$tablename,$updateValue,$where) //set varaibles for lazy_update() function
	 {
		 $this->db = $db;
		 $this->tablename = $tablename;
		 $this->updateValue = $updateValue;
		 $this->where = $where;
	 }
	 
	 public function lazy_update()
	 {
		 $db = $this->db;
		 $tablename = $this->tablename;
		 $updateValue = $this->updateValue;
		 $where = $this->where; 
		 
	 }
  
}
   
?>

