<?php
include_once("Shopping_Cart/functions/db_functions.php");
?>
<html>
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
    <script>
	
      //function to empty the cart
   function empty_cart(){
       $.post('functions.php',{task:"empty"},function(data){
        //alert(data);
			$('.modal-body').html(data);
					$('#myModal').modal({
						  keyboard:true,
						  backdrop:'static'
						 });
			$('#myModal').on('hide.bs.modal', function () { 
			  $.post('functions.php',{task:"no_of_items"},function(data){
				$('.no_of_items').html(data).fadeIn('fast');
				$('.total').html(data+' - Item(s)').fadeIn('fast');
				$('.notify').html(data).fadeIn('fast');
				$('.cart-title').html(data + ' Item(s) in my cart').fadeIn('fast');
			  });
			  $.post('functions.php',{task:"show"},function(data){
				$('.order-detail-content').html(data);
			   });
			  $.post('functions.php',{task:"show_header"},function(data){
				$('.cart-block-content').html(data);
			  });

			});
			
       });
    }
	 function updateQuantities(id){
		 //get the new quantity
		
		var d = id;
		 
		 var new_qty = $('#box_'+d).val();
		  //unique id of this product
		 var id = $('#box_'+d).parent().parent().attr("id");
		 
		 $.post('functions.php', {task:"update_qty",new_qty:new_qty,id:id}, function(data){
				
				$('.cart_total_price').html(data);
				});
				
		$.post('functions.php', {task:"update_qty2",new_qty:new_qty,id:id}, function(data){
				
				$('#sub_'+d).html(data);
				  $.post('functions.php',{task:"no_of_items"},function(data){
					$('.no_of_items').html(data).fadeIn('fast');
					$('.total').html(data+' - Item(s)').fadeIn('fast');
					$('.notify').html(data).fadeIn('fast');
					$.post('functions.php',{task:"show_header"},function(data){
				     $('.cart-block-content').html(data);
			        });

		          });
				  $.post('functions.php',{task:"show"},function(data){
                     $('.order-detail-content').html(data);
				  });
				  $.post('functions.php',{task:"show_header"},function(data){
				     $('.cart-block-content').html(data);
			        });
				
		});
					
	}
	
	
	function checkForDelete(id){
		var d = id;
		//get the value
		var qty = $('#box_'+d).val();
		
		//if you typed 0 and clicked away
		if(qty == 0 ){
			//get the id of the item attached (to the container row)
			var d = $('#box_'+d).parent().parent().attr("id");
			
			
			//use ajax to remove this item from session
			$.post('functions.php', {task:"delete_item",d:d}, function(){
				//use jquery to remove the item from the page
				$("#"+d).remove();
				$.post('functions.php',{task:"no_of_items"},function(data){
					$('.no_of_items').html(data).fadeIn('fast');
					$('.total').html(data+' - Item(s)').fadeIn('fast');
					$('.notify').html(data).fadeIn('fast');
					$('.cart-title').html(data + ' Item(s) in my cart').fadeIn('fast');
			  });
			  $.post('functions.php',{task:"show"},function(data){
                     $('.order-detail-content').html(data);
				  });
				$.post('functions.php',{task:"show_header"},function(data){
				  $('.cart-block-content').html(data);
			    });
			});
			
			
			}
	}
	function delete_item(id){
		var d = id;
		
		//use ajax to remove this item from session
		$.post('functions.php', {task:"delete_item",d:d}, function(){
				//use jquery to remove the item from the page
				$("#"+d).fadeOut();
				$.post('functions.php',{task:"no_of_items"},function(data){
					$('.no_of_items').html(data).fadeIn('fast');
					$('.total').html(data+' - Item(s)').fadeIn('fast');
					$('.notify').html(data).fadeIn('fast');
					$('.cart-title').html(data + ' Item(s) in my cart').fadeIn('fast');
			  });
			  $.post('functions.php',{task:"show"},function(data){
                     $('.order-detail-content').html(data);
				  });
				$.post('functions.php',{task:"show_header"},function(data){
				  $('.cart-block-content').html(data);
			    });
		});
			
	}
	function delete_item_smcart(id){
		var d = id;
		
		//use ajax to remove this item from session
			$.post('functions.php', {task:"delete_item",d:d}, function(){
				//use jquery to remove the item from the page
				$("#"+d).fadeOut();
				$.post('functions.php',{task:"no_of_items"},function(data){
					$('.no_of_items').html(data).fadeIn('fast');
					$('.total').html(data+' - Item(s)').fadeIn('fast');
					$('.notify').html(data).fadeIn('fast');
					$('.cart-title').html(data + ' Item(s) in my cart').fadeIn('fast');
			  });
			  $.post('functions.php',{task:"show"},function(data){
                     $('.order-detail-content').html(data);
				  });
				$.post('functions.php',{task:"show_header"},function(data){
				  $('.cart-block-content').html(data);
			    });
				});
			
	}
	
    </script>
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
                                    
                                    <li class="dropdown">
                                        <a href="about.php" class="dropdown-toggle" data-toggle="dropdown">About Us</a>
                                        <ul class="dropdown-menu container-fluid">
                                            <li class="block-container">
                                                <ul class="block">
                                                    <li class="link_container"><a href="contact.php">Get In Touch</a></li>
                                                    
                                                </ul>
                                            </li>
                                        </ul> 
                                    </li>
                                    <li><a href="javascript:;" data-toggle="modal" data-target="#my_mode">Guidance</a></li>
                                    
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

<div class="columns-container">
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
                <span class="no_of_items"></span>
				<p class="pull-right"><button class="btn btn-danger" onClick="empty_cart()" style="border-radius:0px;background-color:#f8329b;border-color:#f8329b;">Clear the Shopping cart</button></p>
				
            </div>
			
            <div class="order-detail-content"> 
                       
            </div>
        </div>
    </div>
</div>
<!-- Baner bottom -->
        <div class="container">


  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
     <div class="modal-dialog"> 
      <div class="modal-content"> 
       <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> 
        <h4 class="modal-title" id="myModalLabel"> Your Cart Details</h4> 
       </div> 
       <div class="modal-body"> </div> 
       <div class="modal-footer"> 
        <a href="index.php" type="button" class="btn prev-btn pull-left" >Back Shopping</a> 
        <a data-dismiss="modal" class="btn next-btn"> Ok </a> 
       </div> 
      </div><!-- /.modal-content --> 
    </div>
    
    </div>
        <!-- end banner bottom -->
    </div>
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
<script type="text/javascript" src="html/assets/js/my-script.js"></script>

</body>

<!-- Mirrored from kutethemes.com/html/kuteshop/html/order.html by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 27 Sep 2015 11:10:49 GMT -->
</html>