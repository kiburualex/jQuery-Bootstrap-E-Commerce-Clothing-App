<?php
include_once("Shopping_Cart/functions/db_functions.php");
$id = $_GET['id'];//name of category in the categories table
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
	<link rel="stylesheet" type="text/css" href="html/assets/lib/fancyBox/jquery.fancybox.css" />
    <link rel="stylesheet" type="text/css" href="html/assets/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="html/assets/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="html/assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="html/assets/css/responsive.css" />
    <title>Category - Suzie's Shop</title>
    <script>
//funciton add to the cart
    function add_to_cart(a){
		
	    var add_item = a;
		
		
		  $.ajax({
			 url: 'functions.php',
			 type:'post',
			 data:{task:"add",add_item:add_item},
			 success: function(data){
				 //$('#diva').html(data);
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
					  });
					  $.post('functions.php',{task:"show_header"},function(data){
						$('.cart-block-content').html(data);
					  });
				});
			  }  
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
                                    <li class="dropdown active">
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
                                    echo '<li><a href="category2.php?cat=other">Home and Living</a></li>
                                          <li><a href="category2.php?cat=other">Others</a></li>';
                                    
									?>
                                    <li>
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

<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Fashion</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column">
           
                <!-- block category -->
                <div class="block left-module">
                    <p class="title_block">Women's Fashions</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                      <?php
                                 //query to retrieve new items
								 $cat1 = "SELECT * FROM categories WHERE person='women' ";
								 $cat1_r= mysql_query($cat1) or die(mysql_error());
								 
								 while($cat1_ro = mysql_fetch_assoc($cat1_r)){
									 ?>
									 <li><span></span><a href="category.php?id=<?php echo $cat1_ro['id'];?>"><?php echo $cat1_ro['cat_name'];?></a></li>
									 <?php
                                     }
									 ?>
                                    
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./block category  -->
                <!-- block category -->
                <div class="block left-module">
                    <p class="title_block">Men's Fashions</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                    
                                    <?php
                                 //query to retrieve new items
								 $cat2 = "SELECT * FROM categories WHERE person='men' ";
								 $cat2_r= mysql_query($cat2) or die(mysql_error());
								 
								 while($cat2_ro = mysql_fetch_assoc($cat2_r)){
									 ?>
									 <li><span></span><a href="category.php?id=<?php echo $cat2_ro['id'];?>"><?php echo $cat2_ro['cat_name'];?></a></li>
									 <?php
                                     }
									 ?>
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./block category  -->
                <!-- block category -->
                <div class="block left-module">
                    <p class="title_block">Kid's Fashions</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                    <?php
                                 //query to retrieve new items
								 $cat3 = "SELECT * FROM categories WHERE person='kids' ";
								 $cat3_r= mysql_query($cat3) or die(mysql_error());
								 
								 while($cat3_ro = mysql_fetch_assoc($cat3_r)){
									 ?>
									 <li><span></span><a href="category.php?id=<?php echo $cat3_ro['id'];?>"><?php echo $cat3_ro['cat_name'];?></a></li>
									 <?php
                                     }
									 ?>
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./block category  -->
                <!-- block category -->
                <div class="block left-module">
                    <p class="title_block">Others Accessories</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                    <?php
                                 //query to retrieve new items
								 $cat4 = "SELECT * FROM categories WHERE person='other' ";
								 $cat4_r= mysql_query($cat4) or die(mysql_error());
								 
								 while($cat4_ro = mysql_fetch_assoc($cat4_r)){
									 ?>
									 <li><span></span><a href="category.php?id=<?php echo $cat4_ro['id'];?>"><?php echo $cat4_ro['cat_name'];?></a></li>
									 <?php
                                     }
									 ?>
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./block category  -->
                <!-- block filter -->
                
                <!-- ./block filter  -->
                
                <!-- left silide -->
                <div class="col-left-slide left-module">
                    <ul class="owl-carousel owl-style2" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1" data-autoplay="true">
                        <li><a href="#"><img src="html/assets/data/slide-left.jpg" alt="slide-left"></a></li>
                        <li><a href="#"><img src="html/assets/data/slide-left2.jpg" alt="slide-left"></a></li>
                        <li><a href="#"><img src="html/assets/data/slide-left3.png" alt="slide-left"></a></li>
                    </ul>

                </div>
                <!--./left silde-->
                
                <!-- Testimonials -->
                <div class="block left-module">
                    <p class="title_block">Testimonials</p>
                    <div class="block_content">
                        <ul class="testimonials owl-carousel" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplay="true" data-autoplayHoverPause = "true" data-items="1">
                            <li>
                                <div class="client-mane">Roverto & Maria</div>
                                <div class="client-avarta">
                                    <img src="html/assets/data/testimonial.jpg" alt="client-avarta">
                                </div>
                                <div class="testimonial">
                                    "Your product needs to improve more. To suit the needs and update your image up"
                                </div>
                            </li>
                            <li>
                                <div class="client-mane">Roverto & Maria</div>
                                <div class="client-avarta">
                                    <img src="html/assets/data/testimonial.jpg" alt="client-avarta">
                                </div>
                                <div class="testimonial">
                                    "Your product needs to improve more. To suit the needs and update your image up"
                                </div>
                            </li>
                            <li>
                                <div class="client-mane">Roverto & Maria</div>
                                <div class="client-avarta">
                                    <img src="html/assets/data/testimonial.jpg" alt="client-avarta">
                                </div>
                                <div class="testimonial">
                                    "Your product needs to improve more. To suit the needs and update your image up"
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- ./Testimonials -->
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- category-slider -->
                <div class="category-slider">
                    <ul class="owl-carousel owl-style2" data-dots="false" data-loop="true" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1">
                        <li>
                            <img src="html/assets/data/category-slide.jpg" alt="category-slider">
                        </li>
                        <li>
                            <img src="html/assets/data/slide-cart2.jpg" alt="category-slider">
                        </li>
                    </ul>
                </div>
                <!-- ./category-slider -->
                <!-- subcategories -->
                <div class="subcategories">
                    <ul class="nav-tab">
                        <li class="current-categorie active">
                        <?php
                                
								 $tabi = mysql_query("SELECT * FROM categories WHERE id='".$id."' ")or die(mysql_error());
								 $tab_fetchi = mysql_fetch_assoc($tabi);
								 $pers = $tab_fetchi['person'];
								 $cat = $tab_fetchi['cat_name'];
									 ?>
                            <a data-toggle="tab" href="javascript:;"><?php echo $pers.'\'s fashion';?></a>
                        </li>
                         
                    </ul>
                    
                </div>
                <!-- ./subcategories -->
                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list">
                    <h2 class="page-heading">
                        <span class="page-heading-title"><?php echo $cat;?></span>
                    </h2>
                    <ul class="display-product-option">
                        <li class="view-as-grid selected">
                            <span>grid</span>
                        </li>
                        <li class="view-as-list">
                            <span>list</span>
                        </li>
                    </ul>
                    <!-- PRODUCT LIST -->
                   <div class="tab-container">
                   
                    <ul class="row product-list grid tab-panel active" id="tab-1">
                    <?php
                                 //query to retrieve the person in the categories page
								 $tab = mysql_query("SELECT * FROM items WHERE category='".$cat."' AND person='".$pers."' ")or die(mysql_error());
								 
										  
								 while($tab_fetch = mysql_fetch_assoc($tab)){
									 
									 ?>
                                     
                        
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="detail.php?id=<?php echo $tab_fetch['id'];?>">
                                        <img class="img-responsive" alt="product" src="Shopping_cart/<?php echo $tab_fetch['image_location'];?>" />
                                    </a>
                                    
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" onClick="add_to_cart('<?php echo $tab_fetch['id'];?>')">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php?id=<?php echo $tab_fetch['id'];?>"><?php echo $tab_fetch['name'];?></a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price"><?php echo $tab_fetch['price'];?></span>
                                        
                                    </div>
                                    <div class="info-orther">
                                        
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            <?php echo $tab_fetch['description'];?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php 
								 }
								 
									 
								 
						?>	
                        
                    </ul>
                    
                    <!---./ 2nd Tab-->
                    <!--<ul class="row product-list grid tab-panel" id="tab-2">
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="detail.php">
                                        <img class="img-responsive" alt="product" src="html/assets/data/p40.jpg" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Imewak</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #453217907</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="detail.php">
                                        <img class="img-responsive" alt="product" src="html/assets/data/p35.jpg" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #453217907</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="detail.php">
                                        <img class="img-responsive" alt="product" src="html/assets/data/p41.jpg" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #453217907</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="detail.php">
                                        <img class="img-responsive" alt="product" src="html/assets/data/p37.jpg" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #453217907</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="detail.php">
                                        <img class="img-responsive" alt="product" src="html/assets/data/p38.jpg" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #453217907</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="detail.php">
                                        <img class="img-responsive" alt="product" src="html/assets/data/p39.jpg" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #453217907</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="detail.php">
                                        <img class="img-responsive" alt="product" src="html/assets/data/product-300x366.jpg" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #453217907</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="detail.php">
                                        <img class="img-responsive" alt="product" src="html/assets/data/p36.jpg" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #453217907</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="detail.php">
                                        <img class="img-responsive" alt="product" src="html/assets/data/p42.jpg" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #453217907</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="detail.php">
                                        <img class="img-responsive" alt="product" src="html/assets/data/p34.jpg" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #453217907</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="detail.php">
                                        <img class="img-responsive" alt="product" src="html/assets/data/p89.jpg" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #453217907</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="detail.php">
                                        <img class="img-responsive" alt="product" src="html/assets/data/p90.jpg" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #453217907</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="detail.php">
                                        <img class="img-responsive" alt="product" src="html/assets/data/p91.jpg" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #453217907</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="detail.php">
                                        <img class="img-responsive" alt="product" src="html/assets/data/p92.jpg" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #453217907</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="detail.php">
                                        <img class="img-responsive" alt="product" src="html/assets/data/p93.jpg" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #453217907</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="detail.php">
                                        <img class="img-responsive" alt="product" src="html/assets/data/p94.jpg" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #453217907</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="detail.php">
                                        <img class="img-responsive" alt="product" src="html/assets/data/p95.jpg" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #453217907</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="detail.php">
                                        <img class="img-responsive" alt="product" src="html/assets/data/p96.jpg" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #453217907</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>-->
                    <!---,/ end 2nd Tab---->
                    
                    </div>
                    <!-- ./PRODUCT LIST -->
                </div>
                <!-- ./view-product-list-->
                <div class="sortPagiBar">
                    <div class="bottom-pagination">
                        <nav>
                          <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">Next &raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                    <div class="show-product-item">
                        <select name="">
                            <option value="">Show 18</option>
                            <option value="">Show 20</option>
                            <option value="">Show 50</option>
                            <option value="">Show 100</option>
                        </select>
                    </div>
                    <div class="sort-product">
                        <select>
                            <option value="">Product Name</option>
                            <option value="">Price</option>
                        </select>
                        <div class="sort-product-icon">
                            <i class="fa fa-sort-alpha-asc"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
<div class="container-fluid">


  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
     <div class="modal-dialog"> 
      <div class="modal-content"> 
       <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> 
        <h4 class="modal-title" id="myModalLabel"> Your Cart Details</h4> 
       </div> 
       <div class="modal-body"> </div> 
       <div class="modal-footer"> 
        <button type="button" class="btn prev-btn pull-left" data-dismiss="modal">Continue Shopping</button> 
        <a href="order.php" class="btn next-btn"> Check Order </a> 
       </div> 
      </div><!-- /.modal-content --> 
    </div>
    
    </div>
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
<script type="text/javascript" src="html/assets/lib/fancyBox/jquery.fancybox.js"></script>
<script type="text/javascript" src="html/assets/lib/jquery.elevatezoom.js"></script>

<script type="text/javascript" src="html/assets/js/theme-script.js"></script>
<script type="text/javascript" src="html/assets/js/my-script.js"></script>
</body>

<!-- Mirrored from kutethemes.com/html/kuteshop/html/category.html by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 27 Sep 2015 11:08:59 GMT -->
</html>