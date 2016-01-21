<?php
try{
	$db = new PDO("mysql:dbname=fnhOM;host=localhost", "fnhAdmin", "7453212");
} catch (PDOExceptioin $e){
	echo 'Connection Failed: ' . $e->getMessage();	
}
?>