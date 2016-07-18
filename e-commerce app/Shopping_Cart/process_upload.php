<?php
$db = mysql_connect('localhost', 'root', 'root') or die('Error connecting to mysql');
	mysql_select_db('bootstrap_ex');
//header("Location: Registration.php");
//exit();
//Get the file name
$filename = $_FILES['file']['name'];
$fileTmpLoc = $_FILES['file']['tmp_name'];
$fileType=$_FILES['file']['type'];
$fileSize=$_FILES['file']['size'];
$fileErrorMsg=$_FILES['file']['error'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];

if(!$fileTmpLoc)
   {
	echo "Error: Please browse for a file before upload";
	exit();
	}
	if(move_uploaded_file($fileTmpLoc,"image/$filename"))
	 {
		 echo "$filename upload is complete";
	 }else
	 {
        echo "move_uploaded_function failed";
	  }
	
	
	
	
	$query = 'INSERT INTO form (fname, lname) 
	          VALUES ("'.$fname.'", "'.$lname.'")';
	$result = mysql_query($query, $db) or die(mysql_error());
			  
			  if($result == true){
				  echo 'data inserted';
				  }else{
					  echo 'not inserted';
					  }
	  
?>