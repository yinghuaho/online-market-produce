<?php
include('connection.php');

 class database
 {	 	 
	 public $db;
	 public $tablename = "tablename";
	 public $columns = "columns";
	 public $where = "where";
	 public $orderBy = "orderBY";
	 
	 public function set_lazy_select($db,$tablename,$columns,$where,$orderBy) //set varaibles for lazy_select() function
	 {
		 $this->db = $db;
		 $this->tablename = $tablename;
		 $this->columns = $columns;
		 $this->where = $where;
		 $this->orderBy = $orderBy;
	 }
	 
	 public function lazy_select() //function supports all kind of database select function 
	 {
		 $db = $this->db;
		 $tablename = $this->tablename;
		 $columns = $this->columns;
		 $where = $this->where;
		 $orderBy = $this->orderBy;
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
			 $statement = $db->prepare($querey);
			 $statement->execute($executeArray);
			 $arr = $statement->errorInfo();
/*			 if($arr)
			 {
			 print_r("database handling error".$arr);
			 }	*/	 
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
				array_push($result,$result_success);
			}
		 }else
		 {
			$result_failed = array("message" => "failed");
			array_push($result,$result_failed);
		 }
		 
		 echo json_encode($result);
		 
	 }
	 
 }
 

 
 
 
/* $test = new database;
 //$columns = array(f_name, l_name, secruitycode);
 $columns = array();
 $where = array("username"=> "admin","password" =>"123");
 //$where = array();
 $orderBy = array(id); //("column_name DESC or ASC or leave it blank")
 $test->set_lazy_select($db,"userinfo",$columns,$where,$orderBy);
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
?>

