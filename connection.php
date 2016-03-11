<?php
try{
	$db = new PDO("mysql:dbname=fnhOM;host=localhost", "root", "");
} catch (PDOExceptioin $e){
	echo 'Connection Failed: ' . $e->getMessage();	
}
?>