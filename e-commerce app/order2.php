<?php
include_once("Shopping_Cart/functions/db_functions.php");
?>
<html>

<!-- Mirrored from kutethemes.com/html/kuteshop/html/about.html by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 27 Sep 2015 11:11:13 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="html/assets/lib/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="html/assets/lib/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="html/assets/lib/select2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="html/assets/lib/jquery.bxslider/jquery.bxslider.css" />
    <link rel="stylesheet" type="text/css" href="html/assets/lib/owl.carousel/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="html/assets/lib/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="html/assets/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="html/assets/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="html/assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="html/assets/css/responsive.css" />
    <title>Your Order - Suzie's Shop</title>
</head>
<body class="category-page">
<!-- HEADER -->
<div id="header" class="header">
    <?php
       echo top_header();
	?>
    <!--/.top-header -->
    <!-- MAIN HEADER -->
    <?php
      echo main_header();
	?>
    <div id="nav-top-menu" class="nav-top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" id="box-vertical-megamenus">
                    <div class="box-vertical-megamenus">
                    <h4 class="title">
                        <span class="title-menu">Categories</span>
                        <span class="btn-open-mobile pull-right"><i class="fa fa-bars"></i></span>
                    </h4>
                    <div class="vertical-menu-content is-home">
                        <ul class="vertical-menu-list">
                            <li><a href="<?php echo 'category2.php?cat=men';?>"><img class="icon-menu" alt="Funky roots" src="html/assets/data/1.png">Mens Fashions</a></li>
                            
                            <li><a href="<?php echo 'category2.php?cat=women';?>"><img class="icon-menu" alt="Funky roots" src="html/assets/data/3.png">Womens Fashions</a></li>
                            <li><a href="<?php echo 'category2.php?cat=kids';?>"><img class="icon-menu" alt="Funky roots" src="html/assets/data/4.png">Kids Fashions</a></li>
                            
                            <li><a href="<?php echo 'category2.php?cat=other';?>"><img class="icon-menu" alt="Funky roots" src="html/assets/data/6.png">Home and Living</a></li>
                            
                            <li><a href="<?php echo 'category2.php?cat=other';?>"><img class="icon-menu" alt="Funky roots" src="html/assets/data/7.png">Others</a></li>
                            
                            
                            <?php
                                 //query to retrieve new items
								 $cq = "SELECT * FROM categories WHERE person='other' LIMIT 0,4";
								 $cre= mysql_query($cq) or die(mysql_error());
								 
								 while($crow = mysql_fetch_assoc($cre)){?>
									   
                                       <li class="cat-link-orther">
                                        <a href="category.php?id=<?php echo $crow['id'];?>">
                                            <img class="icon-menu" alt="Funky roots" src="html/assets/data/4.png">
                                            <?php echo $crow['cat_name'];?>
                                        </a>
                                       </li>
									 <?php
									 }
									 ?>
                            
                            
                        </ul>
                        <div class="all-category"><span class="open-cate">All Categories</span></div>
                    </div>
                </div>
                </div>
                <div id="main-menu" class="col-sm-9 main-menu">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="#">MENU</a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a  href="index.php">Home</a>
                                        
                                    </li>
                                    <li class="dropdown">
                                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">Fashion</a>
                                        <ul class="dropdown-menu mega_dropdown" role="menu" style="width: 830px;">
                                            <li class="block-container col-sm-3">
                                                <ul class="block">
                                                    <li class="img_container">
                                                        <a href="#">
                                                            <img class="img-responsive" src="html/assets/data/men.png" alt="sport">
                                                        </a>
                                                    </li>
                                                    <li class="link_container group_header">
                                                        <a href="category2.php?cat=<?php echo 'men';?>">MEN'S</a>
                                                    </li>
                                                    <?php
                                 //query to retrieve new items
								 $query = "SELECT * FROM categories WHERE person='men' LIMIT 0,5";
								 $r = mysql_query($query) or die(mysql_error());
								 
								 while($ro = mysql_fetch_assoc($r)){
									   
									  echo '<li class="link_container"><a href="category.php?id='.$ro['id'].'">'.$ro['cat_name'].'</a></li>';
									 }
									 ?>
                                                    
                                                </ul>
                                            </li>
                                             <li class="block-container col-sm-3">
                                                <ul class="block">
                                                    <li class="img_container">
                                                        <a href="#">
                                                            <img class="img-responsive" src="html/assets/data/women.png" alt="sport">
                                                        </a>
                                                    </li>
                                                    <li class="link_container group_header">
                                                        <a href="category2.php?cat=<?php echo 'women';?>">WOMEN'S</a>
                                                    </li>
                                                   <?php
                                 //query to retrieve new items
								 $query = "SELECT * FROM categories WHERE person='women' LIMIT 0,5";
								 $r = mysql_query($query) or die(mysql_error());
								 
								 while($ro = mysql_fetch_assoc($r)){
									   
									  echo '<li class="link_container"><a href="category.php?id='.$ro['id'].'">'.$ro['cat_name'].'</a></li>';
									 }
									 ?>
                                                </ul>
                                            </li>
                                             <li class="block-container col-sm-3">
                                                <ul class="block">
                                                    <li class="img_container">
                                                        <a href="#">
                                                            <img class="img-responsive" src="html/assets/data/kid.png" alt="sport">
                                                        </a>
                                                    </li>
                                                    <li class="link_container group_header">
                                                        <a href="category2.php?cat=<?php echo 'kids';?>">Kids</a>
                                                    </li>
                                                    <?php
                                 //query to retrieve new items
								 $query = "SELECT * FROM categories WHERE person='kids' LIMIT 0,5";
								 $r = mysql_query($query) or die(mysql_error());
								 
								 while($ro = mysql_fetch_assoc($r)){
									   
									  echo '<li class="link_container"><a href="category.php?id='.$ro['id'].'">'.$ro['cat_name'].'</a></li>';
									 }
									 ?>
                                                </ul>
                                            </li>
                                             <li class="block-container col-sm-3">
                                                <ul class="block">
                                                    <li class="img_container">
                                                        <a href="#">
                                                            <img class="img-responsive" src="html/assets/data/trending.png" alt="sport">
                                                        </a>
                                                    </li>
                                                    <li class="link_container group_header">
                                                        <a href="category2.php?cat=<?php echo 'other';?>">TRENDING</a>
                                                    </li>
                                                    <?php
                                 //query to retrieve new items
								 $query = "SELECT * FROM categories WHERE person='other' LIMIT 0,5";
								 $r = mysql_query($query) or die(mysql_error());
								 
								 while($ro = mysql_fetch_assoc($r)){
									   
									  echo '<li class="link_container"><a href="category.php?id='.$ro['id'].'">'.$ro['cat_name'].'</a></li>';
									 }
									 ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                    
                                    <?php
                                    echo '<li><a href="category.php?cat=other">Home and Living</a></li>
                                          <li><a href="category.php?cat=other">Others</a></li>';
                                    
									?>
                                    <li class="active">
                                        <a href="order.php">Order</a>
                                         
                                    </li>
                                    
                                    <li>
                                        <a href="about.php">About Us</a>
                                         
                                    </li>
                                    <li><a href="contact.php">Our Contacts</a></li>
                                    
                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                </div>
            </div>
            <!-- userinfo on top-->
            <div id="form-search-opntop">
            </div>
            <!-- userinfo on top-->
            <div id="user-info-opntop">
            </div>
            <!-- CART ICON ON MMENU -->
            <div id="shopping-cart-box-ontop">
                <i class="fa fa-shopping-cart"></i>
                <div class="shopping-cart-box-ontop-content"></div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->
<!-- page wapper-->
<?php
	
if(isset($_GET['add'])){
	$_SESSION['cart_'.(int)$_GET['add']]+='1';
	header('Location: order.php'); 
}
if(isset($_GET['remove'])){
	$_SESSION['cart_'.(int)$_GET['remove']]--;
	header('Location: order.php'); 
}
if(isset($_GET['delete'])){
	session_destroy();
	header('Location: order2.php'); 
}

$count1 = 0;
foreach($_SESSION as $name => $value){
	  $count1+=$value;
	}

echo '<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Your shopping cart</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading no-line">
            <span class="page-heading-title2">Shopping Cart Summary</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content page-order">
            
            <div class="heading-counter warning">Your shopping cart contains:
                <span>'.$count1.' Product(s)</span>
				<a href="order2.php?delete=1" class="btn clear_cart btn-small col-sm-3">Clear the Shopping cart</a>
				
            </div>
			
            <div class="order-detail-content"> ';
                        function cart(){
							
							echo '<table class="table table-bordered table-responsive cart_summary">
									<thead>
										<tr>
											<th class="cart_product">Product</th>
											<th>Description</th>
											<th>Avail.</th>
											<th>Unit price</th>
											<th>Qty</th>
											<th>Total</th>
											<th  class="action"><i class="fa fa-trash-o"></i></th>
										</tr>
									</thead>
                                   <tbody>';
							       $total = 0;
							       $count = 0;
								   foreach($_SESSION as $name => $value){
									   
										  if($value>0){
											
											 if(substr($name, 0, 5) == 'cart_'){
												 //the length of cart_ is 5 so we remove it to remain with the number only
												 $id = substr($name, 5, strlen($name)-5);
												 //get the id details from the db
												 $get = mysql_query('SELECT * FROM items WHERE id='.mysql_real_escape_string((int)$id));
												 
												 while($get_row = mysql_fetch_assoc($get)){
													  $sub = $get_row['price'] * $value;
													  
													  echo '<tr>
																<td class="cart_product">
																	<a href="#"><img src="Shopping_Cart/'.$get_row['image_location'].'" alt="Product" style="width:100px;height:122px;"></a>
																</td>
																<td class="cart_description">
																	<p class="product-name"><a href="#">'.$get_row['name'].'</a></p>
																	<small class="cart_ref">Category : '.$get_row['category'].'</small><br>
																	<small><a href="#">Person : '.$get_row['person'].'</a></small>
																</td>
																<td class="cart_avail"><span class="label label-success">In stock</span></td>
																<td class="price"><span> KShs '.$get_row['price'].'</span></td>
																<td class="qty">
																	<input class="form-control input-sm" type="text" value="'.$value.'">
																	<!--<span class="col-sm-12">'.$value.'</span>-->
																	<a href="order.php?add='.$id.'"><i class="fa fa-caret-up"></i></a>
																	<a href="order.php?remove='.$id.'"><i class="fa fa-caret-down"></i></a>
																</td>
																<td class="price">
																	<span> KShs '.$sub.'</span>
																</td>
																<td class="action">
																	<a href="order.php?delete='.$id.'">Delete item</a>
																</td>
														   </tr>';
													}
												 }
												
												$total = $total + $sub;
												
												
											}else if($value = 0){
												echo $empty;
												 echo '<tr><td colspan="4">Your cart is Empty</td></tr>';
												}
											
										   
								   }
								   
							   echo   '</tbody>
													<tfoot>
														<tr>
															<td colspan="2" rowspan="2"></td>
															<td colspan="3">Total products (tax incl.)</td>
															<td colspan="2">KShs '.$total.'</td>
														</tr>
														<tr>
															<td colspan="3"><strong>Total</strong></td>
															<td colspan="2"><strong>122.38 €</strong></td>
														</tr>
													</tfoot>    
											</table>';
						}
						
                        cart();
                    
				
                echo '<div class="cart_navigation">
                    <a class="prev-btn" href="#">Continue shopping</a>
                    <a class="next-btn" href="#">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>';
//sfvsf
					
                    
?>
<!-- ./page wapper-->
<!-- Footer -->
<?php
   echo footer();
?>

<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<!-- Script-->
<script type="text/javascript" src="html/assets/lib/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="html/assets/lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="html/assets/lib/select2/js/select2.min.js"></script>
<script type="text/javascript" src="html/assets/lib/jquery.bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="html/assets/lib/owl.carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="html/assets/lib/jquery.countdown/jquery.countdown.min.js"></script>

<script type="text/javascript" src="html/assets/lib/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="html/assets/js/jquery.actual.min.js"></script>

<script type="text/javascript" src="html/assets/js/theme-script.js"></script>

</body>

<!-- Mirrored from kutethemes.com/html/kuteshop/html/order.html by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 27 Sep 2015 11:10:49 GMT -->
</html>