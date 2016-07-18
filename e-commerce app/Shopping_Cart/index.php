<?php
include_once("functions/db_functions.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" style="height:100%;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<!--<link href="css/bootstrap-theme.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">-->
<link href="css/myCss2.css" rel="stylesheet">

<script type="text/javascript" src="js/jquery1.11.3.js"></script>
<style>
   .sidebar{
	   height:90%;
	   overflow-y:scroll;
	 }
  .main-content{
	   background-color:#E9E9E9;
	   height:90%;
	   overflow-y:scroll;
	   padding:20px;
	} 
	
	.navbar-text span{
		color:#fff;
		font-size:0.9em;
		background-color:#02618E;
		border:0px;
		border-radius:0px;
		}
	.navbar-text a{
		text-decoration:none;
		color:#fff;
		font-size:0.9em;
		background-color:#02618E;
		border:0px;
		border-radius:0px;
		}
</style>
</head>

<body>
<div>
  <!--========NAVIGATION=========--->
   <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
   <div class="container-fluid"> 
     <div class="navbar-header"> 
       
      <p class="logo" ><a href="index.php">BOUTIQUE MANAGEMENT APP</a></p> 
     </div> 
     
    <div class="navbar-right">
         <p class="navbar-text ">
            <?php
         if(loggedin())
		 {
			 echo '<span class="btn btn-primary"><img src="image/icons/men.png" width="15" height="15" /> Logged in as '.$_SESSION['user'].'</span>';
			 echo ' <a href="../Clothe Site/logout.php" class="btn btn-primary"> Logout <img src="image/icons/logout1.png" width="15" height="15" /></a>';
		 }else{
			 header('Location:../Clothe Site/index.php');
		}
	   ?>
         </p>
      </div>
      
      </div>
    </nav>
    </div>
<!--========END NAVIGATION=========--->

<!--======CONTAINER======-->
<div class="container-fluid aside_container">
<div class="row aside_row">
   <!--======SIDEBAR======-->
   <aside class="sidebar col-md-3">
       <div class="row" style="text-align:center;padding-top:15px;">
       <img src="image/icons/dashboard clothes.png" width="100" height="100"/>
       <p style="color:#fff;">Your Logo comes here</p>
       </div>
       
     <div class="panel-group" id="accordion" style="padding-top:30px;">
       
       <div class="panel panel-nav" id="panel" style="border:none;border-radius:0px;">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
           <div class="panel-heading" id="panel-heading"> 
             <h4 class="panel-title" id="panel-title"> Men </h4> 
            </div> 
           </a>
          <div id="collapseOne" class="panel-collapse collapse in"> 
           <div class="panel-body" id="panel-body"> <ul class="nav men-nav">
         <li><a href="add-men-category.php">Add Category</a></li>
         <li><a href="view-men-category.php">View Categories</a></li>
         <li><a href="add-men-items.php">Add Items</a></li>
         <li><a href="view-men-items.php">View Items</a></li>
         </ul> </div> 
          </div> 
     </div> 
     
     <div class="panel" id="panel" style="border:none;border-radius:0px;"> 
         <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
           <div class="panel-heading" id="panel-heading"> 
               <h4 class="panel-title" id="panel-title"> Women </h4> 
           </div> 
           </a>
          <div id="collapseTwo" class="panel-collapse collapse"> 
           <div class="panel-body" id="panel-body"> <ul class="nav men-nav">
         <li><a href="add-women-category.php">Add Category</a></li>
         <li><a href="view-women-category.php">View Categories</a></li>
         <li><a href="add-women-items.php">Add Items</a></li>
         <li><a href="view-women-items.php">View Items</a></li>
         </ul> </div> 
          </div> 
     </div> 
     
     <div class="panel" id="panel" style="border:none;border-radius:0px;"> 
     <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
           <div class="panel-heading" id="panel-heading"> 
             <h4 class="panel-title" id="panel-title"> Kids </h4> 
           </div> 
           </a>
          <div id="collapseThree" class="panel-collapse collapse"> 
           <div class="panel-body" id="panel-body"> <ul class="nav men-nav">
         <li><a href="add-kids-category.php">Add Category</a></li>
         <li><a href="view-kids-category.php">View Categories</a></li>
         <li><a href="add-kids-items.php">Add Items</a></li>
         <li><a href="view-kids-items.php">View Items</a></li>
         </ul> </div> 
          </div> 
     </div>
      <div class="panel" id="panel" style="border:none;border-radius:0px;"> 
     <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
           <div class="panel-heading" id="panel-heading"> 
             <h4 class="panel-title" id="panel-title"> Others </h4> 
           </div> 
           </a>
          <div id="collapseFour" class="panel-collapse collapse"> 
           <div class="panel-body" id="panel-body"> <ul class="nav men-nav">
         <li><a href="add-other-category.php">Add Category</a></li>
         <li><a href="view-other-category.php">View Categories</a></li>
         <li><a href="add-other-items.php">Add Items</a></li>
         <li><a href="view-other-items.php">View Items</a></li>
         </ul> </div> 
          </div> 
     </div>
     <div class="panel" id="panel" style="border:none;border-radius:0px;"> 
     <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
           <div class="panel-heading" id="panel-heading"> 
             <h4 class="panel-title" id="panel-title"> Home and Living </h4> 
           </div> 
           </a>
          <div id="collapseFive" class="panel-collapse collapse"> 
           <div class="panel-body" id="panel-body"> <ul class="nav men-nav">
         <li><a href="add-home-category.php">Add Category</a></li>
         <li><a href="view-home-category.php">View Categories</a></li>
         <li><a href="add-home-items.php">Add Items</a></li>
         <li><a href="view-home-items.php">View Items</a></li>
         </ul> </div> 
          </div> 
     </div>
      <div class="panel" id="panel" style="border:none;border-radius:0px;"> 
      <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
           <div class="panel-heading" id="panel-heading"> 
             <h4 class="panel-title" id="panel-title"> Orders </h4> 
            </div> 
           </a>
          <div id="collapseSix" class="panel-collapse collapse"> 
           <div class="panel-body" id="panel-body"> <ul class="nav men-nav">
         <li><a href="orders.php">View Orders</a></li>
         <li><a href="fullfilled orders.php">Fullfilled Orders</a></li>
         </ul> </div> 
          </div> 
     </div>  
  
  </div>
   </aside>
   <!--======END SIDEBAR======-->
  
   <!--======CONTENT======-->
   <section class="main-content col-md-9" id="main-content">
  
        <div class="content">
            <div class="row" id="row1">
             <img src="image/icons/admin-woman.png" width="100" height="100"/>
             <h1 style="font-size:2.1em;">DashBoard</h1>
             <blockquote><p class="help-block">Where you manage everything that you have.</p></blockquote>
            </div>
            <div class="row" id="row2">
                <div class="col-md-3">
                    <a href="view-men-items.php">
                       <div class="panel" id="cloth_panel">
                          <div class="panel-body">
                              <img src="image/icons/dashboard clothes4.png" width="100" height="100"/>
                          </div>
                          <div class="panel-footer text-primary">
                            Men Clothes
                          </div>
                       </div>
                     </a>
                </div>
                <div class="col-md-3">
                    <a href="view-women-items.php">
                       <div class="panel" id="cloth_panel">
                          <div class="panel-body">
                              <img src="image/icons/dashboard clothes2.png" width="100" height="100"/>
                          </div>
                          <div class="panel-footer text-primary">
                             Women Clothes
                          </div>
                       </div>
                     </a>
                </div>
                <div class="col-md-3">
                    <a href="view-kids-items.php">
                       <div class="panel" id="cloth_panel">
                          <div class="panel-body">
                              <img src="image/icons/dashboard clothes5.png" width="100" height="100"/>
                          </div>
                          <div class="panel-footer text-primary">
                             Kids Clothes
                          </div>
                       </div>
                     </a>
                </div>
                
                <div class="col-md-3">
                     <a href="view-other-items.php">
                       <div class="panel" id="cloth_panel">
                          <div class="panel-body">
                              <img src="image/icons/dashboard clothes9.png" width="100" height="100"/>
                          </div>
                          <div class="panel-footer text-primary">
                             HandBags & Jewelleries
                          </div>
                       </div>
                     </a>
                </div>
               
            </div>
         </div>
       
   </section>
   <!--======END CONTENT======-->
    </div>
</div>
<!--======END CONTAINER======-->


<script>
   
</script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>