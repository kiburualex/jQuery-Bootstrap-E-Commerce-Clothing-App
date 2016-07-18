<?php
include_once("../Shopping_Cart/functions/db_functions.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" style="height:100%;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale:1.0" />
<link href="../Shopping_Cart/css/bootstrap.min.css" rel="stylesheet">
<!--<link href="css/bootstrap-theme.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">-->
<!--<link href="../Shopping_Cart/css/myCss2.css" rel="stylesheet">-->

<script type="text/javascript" src="../Shopping_Cart/js/jquery1.11.3.js"></script>
<style>
body{
	background-color:#000;
	}
.red{
	color:#ED0730;
	font-size:1.0em;
	text-align:center;
	}
.purple{
	color:#DE1FD0;
	font-size:1.0em;
	text-align:center;
	}
#panel{
	border-radius:0px;
	margin-left:240px;
	margin-top:140px;
	}
#panel-heading{
	}
#panel-body{
	
	}
#panel a{
	text-decoration:none;
}
#panel-title{
	text-align:center;
	color:#003;
}
#panel-title h1{
	text-align:center;
	color:#3387B9;
	font-size:1.3em;
}
#panel-title img{
}
.btn-primary{border-radius:0px;}
input[type=text]{border-radius:0px;}
input[type=password]{border-radius:0px;}
@media only screen and (max-width:768px){
	#panel{
	border-radius:0px;
	margin:auto;
	margin-left:0px;
	margin-top:0px;
	}
	}
</style>
</head>

<body>
<!--======CONTAINER======-->
<div class="container">
 <div class="row">

   <div class="panel col-md-6 col-sm-6 col-xs-12" id="panel">
     <div class="panel panel-heading" id="panel-heading">
        <div class="panel-title" id="panel-title">
        <img src="../Shopping_Cart/image/icons/images.jpg" width="60" height="60"/>
           <h1>Login Page</h1>
        </div>
     </div>
     <?php 
	   if(isset($_POST['username']) && isset($_POST['password']))
		 {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$password_hash = md5($password);
			
			if(!empty($username) && !empty($password))
			{
			   $query = "SELECT username FROM users WHERE username='".$username."' AND password='".$password_hash."' ";
			  if( $result = mysql_query($query))
			    {
				  $query_num_rows = mysql_num_rows($result);
				  if($query_num_rows == 0)
				    {
					  echo '<h2 class="red"><span class="glyphicon glyphicon-asterisk"></span> Invalid username/password combination</h2>';
					}else if($query_num_rows == 1){
					   //register the session using the id
					   $user = mysql_result($result, 0, 'username');
					   $_SESSION['user'] = $user;
					   header('Location: ../Shopping_Cart/index.php');
					}
				}else{
					  
				}
			}else{
				echo '<h2 class="purple"><span class="glyphicon glyphicon-plus"></span> You must supply a username and a password</h2>';
			}   
		 }
	 ?>
     <div class="panel-body" id="panel-body">
         <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>" method="post">
            <div class="form-group">
             <label for="username" class="text-primary"><span class="glyphicon glyphicon-user"></span>  Username:</label>
             <input type="text" name="username" placeholder="Please Enter a username" class="form-control">
            </div>
            <div class="form-group">
             <label for="password" class="text-primary"><span class="glyphicon glyphicon-exclamation-sign"></span>
             Password:</label>
             <input type="password" name="password" placeholder="Please Enter a password" class="form-control">
            </div>
            <div class="form-group">
             <button type="submit" class="btn btn-primary form-control">Login</button>
            </div>
         </form>
     </div>

    </div>
  </div>
<!--======END CONTAINER======-->


<script>
   
</script>
<script type="text/javascript" src="../Shopping_Cart/js/bootstrap.min.js"></script>
</body>
</html>