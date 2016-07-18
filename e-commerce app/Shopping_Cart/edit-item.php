<?php
include_once("functions/db_functions.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="js/bootstrap-fileupload/bootstrap-fileupload.min.css">
<!--<link href="css/bootstrap-theme.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">-->
<link href="css/myCss2.css" rel="stylesheet">

<script type="text/javascript" src="js/jquery1.11.3.js"></script>
<script src="js/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
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
          <div id="collapseOne" class="panel-collapse collapse"> 
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
             <img src="image/icons/_0011_Info.png" width="40" height="40"/>
             <h1 style="font-size:1.4em;">Edit the item</h1>
       </div>   
      <div class="row" style="margin:0 auto;">
       <?php
					
					$id = $_GET['id'];
	   ?>
           <div class="panel col-md-10">
              <div class="panel-body">
             			   
              <form role="form" action="process-edit-item.php" method="post" enctype="multipart/form-data">
               <?php
			    $result = mysql_query('SELECT * FROM items WHERE id = "'.$id.'"');
			    while($row = mysql_fetch_assoc($result)){
					
                 echo '<div class="form-group"> 
                  <label for="name">Name</label> 
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="'.$row['name'].'"> 
				   <input type="hidden" name="id" placeholder="Enter Name" value="'.$row['id'].'"> 
                 </div>
                 <div> 
				    
					<div class="form-group col-md-6">
					  <label for="category">category</label> 
					  <select class="form-control select" name="category">';
					  
					  
						 echo '<option selected="selected">'.$row['category'].'</option>';
						$result2 = mysql_query('SELECT * FROM categories WHERE person = "'.$row['person'].'"');
						
						while($row2 = mysql_fetch_assoc($result2)){
							echo '<option>'.$row2['cat_name'].'</option>';
							}
					  
					  echo '</select> 
					</div>
					
					<div class=" form-group col-md-6">
					  <label for="category">New Or Not New?</label> 
					  <select class="form-control select" name="new">';
					  
					     echo 'dede';
						 echo '<option selected="selected">'.$row['new'].'</option>';
						 echo '<option> New </option>';
						 echo '<option> Not New </option>';
						
					  echo '</select> 
					</div>
					
                 </div>
                 <div class="form-group"> 
                  <label for="price">Price</label> 
                  <input type="text" class="form-control" id="price" name="price" placeholder="KShs." value="'.$row['price'].'"> 
                 </div>
                 <div class="form-group"> 
                  <label for="description">Description</label> 
                  <textarea class="form-control textarea" rows="3" name="description" placeholder="Enter the description">'.$row['description'].'</textarea> 
                 </div>
                 <!--============THE IMAGE FORM GROUP===============-->
       
                         <div class="form-group">
						 <div class="row"><div class="alert alert-info">
														<span class="label label-info">NOTE!</span>
														<span> You can change the Image or leave it as it is. </span>
													</div></div>
						 <div class="row">
							 
										  
                            <div class="col-md-6 col-sm-6">
							
								<label for="image">
									Change the Image
								</label>
								<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="fileupload-new thumbnail"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA?text=no+image" alt="" class="img-responsive"/>
								</div>
								
								<div class="fileupload-preview fileupload-exists thumbnail"></div>
									<div>
									<span class="btn btn-light-grey btn-file">
										<span class="fileupload-new"><i class="fa fa-picture-o"></i> Select image</span>
										<span class="fileupload-exists"><i class="fa fa-picture-o"></i> Change</span>
									   <input type="file" id="file_up" name="image">
									 </span>
									 
									 <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
																		<i class="fa fa-times"></i> Remove</a>
									  </div>
								</div>
													
                           </div>
										  
										  
						  <div class="col-md-6 col-sm-6">
			 
							<div class="form-group">
							<div>
								<label for="image">
									Existing Image
								</label>
								</div>
								<img src="'.$row['image_location'].'" class="img-thumbnail img-responsive" style="max-height:250px;"/>
							</div>
							  
						</div>
										  
											</div>	
                         </div>
						 <input type="hidden" name="person" value="'.$row['person'].'">
						 ';}?> 
                   <!--============END OF THE IMAGE FORM GROUP=============-->
                   <div class="form-group">
                 <button type="submit" class="btn  btn-primary" id="btn-primary1">Submit</button>
                 </div>
              </form>
                 
                </div>
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