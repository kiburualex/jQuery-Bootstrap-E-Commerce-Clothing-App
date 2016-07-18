<?php

$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'root';
	$dbname = 'clothes_db';

	$db = mysql_connect($dbhost, $dbuser, $dbpass) or mysql_error();
	
	$d = mysql_select_db($dbname, $db);
	
	$name = 'mikal';
	$quantity = '2';	
	
	$ent = mysql_query('INSERT INTO `order`(`id`, `name`, `quantity`) VALUES ("'.' '.'","'.$name.'","'.$quantity.'")'); 
	if(!$ent){
		echo 'Not inserted';
		}else{
			echo 'success';
			}
		
?>