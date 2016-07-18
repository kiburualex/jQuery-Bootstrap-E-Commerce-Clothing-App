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
    <link rel="stylesheet" type="text/css" href="html/assets/lib/fancyBox/jquery.fancybox.css" />
    <link rel="stylesheet" type="text/css" href="html/assets/lib/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="html/assets/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="html/assets/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="html/assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="html/assets/css/responsive.css" />
    
    <title>Suzie's shop</title>
    
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
	 function add_to_cart2(a){
		
	    var add_item = a;
		
		
		  $.ajax({
			 url: 'functions.php',
			 type:'post',
			 data:{task:"add",add_item:add_item},
			 success: function(data){
				 
				$('.reply').html(data);
				
			  }  
		   });
		   
    }
	
	 function detail(a){
		
	    var detail_item = a;
		//alert(detail_item);
		
		  $.ajax({
			 url: 'functions.php',
			 type:'post',
			 data:{task:"detail",detail_item:detail_item},
			 success: function(data){
				 //$('#diva').html(data);
				 //alert(data);
				$('.detail_modal_body').html(data);
				$('#detail_modal').modal({
					  keyboard:true,
					  backdrop:'static'
					 });
				$('#detail_modal').on('hide.bs.modal', function () { 
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
<body class="home" onLoad="view_no_items()">

<div id="diva">
<!-- TOP BANNER -->
<!--<div id="top-banner" class="top-banner">
    <div class="bg-overlay"></div>
    <div class="container">
        <h1>Special Offer!</h1>
        <h2>Additional 40% OFF For Men & Women Clothings</h2>
        <span>This offer is for online only 7PM to middnight ends in 30th July 2015</span>
        <span class="btn-close"></span>
    </div>
</div>-->
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
    <!-- END MANIN HEADER -->
    <div id="nav-top-menu" class="nav-top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" id="box-vertical-megamenus">
                    <div class="box-vertical-megamenus">
                        <h4 class="title">
                            <span class="title-menu">Categories</span>
                            <span class="btn-open-mobile pull-right home-page"><i class="fa fa-bars"></i></span>
                        </h4>
                    <div class="vertical-menu-content is-home">
                        <ul class="vertical-menu-list">
                            <li><a href="<?php echo 'men.php?id=1';?>"><img class="icon-menu" alt="Funky roots" src="html/assets/data/1.png">Mens Fashions</a></li>
                            
                            <li><a href="<?php echo 'women.php?id=1';?>"><img class="icon-menu" alt="Funky roots" src="html/assets/data/3.png">Womens Fashions</a></li>
                            <li><a href="<?php echo 'kids.php?id=1';?>"><img class="icon-menu" alt="Funky roots" src="html/assets/data/4.png">Kids Fashions</a></li>
                            
                            <li><a href="<?php echo 'home_and_living.php';?>"><img class="icon-menu" alt="Funky roots" src="html/assets/data/6.png">Home and Living</a></li>
                            
                            <li><a href="<?php echo 'others.php';?>"><img class="icon-menu" alt="Funky roots" src="html/assets/data/7.png">Others</a></li>
                            
                            
                            <?php
                                 //query to retrieve new items
								 $cq = "SELECT * FROM categories WHERE person='other' LIMIT 0,4";
								 $cre= mysql_query($cq) or die(mysql_error());
								 
								 while($crow = mysql_fetch_assoc($cre)){?>
									   
                                       <li class="cat-link-orther">
                                        <a href="others.php">
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
                                    <li class="active">
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
                                                        <a href="men.php?cat=<?php echo 'men';?>">MEN'S</a>
                                                    </li>
                                                    <?php
                                 //query to retrieve new items
								 $query = "SELECT * FROM categories WHERE person='men' LIMIT 0,5";
								 $r = mysql_query($query) or die(mysql_error());
								 
								 while($ro = mysql_fetch_assoc($r)){
									   
									  echo '<li class="link_container"><a href="men.php?id='.$ro['id'].'">'.$ro['cat_name'].'</a></li>';
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
									   
									  echo '<li class="link_container"><a href="women.php?id='.$ro['id'].'">'.$ro['cat_name'].'</a></li>';
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
									   
									  echo '<li class="link_container"><a href="kids.php?id='.$ro['id'].'">'.$ro['cat_name'].'</a></li>';
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
									   
									  echo '<li class="link_container"><a href="others.php">'.$ro['cat_name'].'</a></li>';
									 }
									 ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                    
                                    <?php
                                    echo '<li><a href="home_and_living.php">Home and Living</a></li>
                                          <li><a href="others.php">Others</a></li>';
                                    
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
<!-- Home slideder-->
<div id="home-slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 slider-left"></div>
            <div class="col-sm-9 header-top-right">
                <div class="homeslider">
                    <div class="content-slide">
                        <ul id="contenhomeslider">
                          <li><img alt="Funky roots" src="html/assets/data/slide.jpg" title="Funky roots" /></li>
                          <li><img alt="Funky roots" src="html/assets/data/slide.jpg" title="Funky roots" /></li>
                          <li><img  alt="Funky roots" src="html/assets/data/slide.jpg" title="Funky roots" /></li>
                        </ul>
                    </div>
                </div>
                <div class="header-banner banner-opacity">
                    <a href="#"><img alt="Funky roots" src="html/assets/data/ads1.jpg" /></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Home slideder-->
<!-- servives -->

<!-- end services -->

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-9 page-top-left">
                <div class="popular-tabs">
                      <ul class="nav-tab">
                        <li class="active"><a data-toggle="tab" href="#tab-1">BEST SELLERS</a></li>
                        <li><a data-toggle="tab" href="#tab-2">ON SALE</a></li>
                       
                      </ul>
                      <div class="tab-container">
                            <div id="tab-1" class="tab-panel active">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                <?php
                                 //query to retrieve new items
								 $qa = "SELECT * FROM items WHERE new='New' LIMIT 0,6";
								 $resulta = mysql_query($qa) or die(mysql_error());
								 
								 while($rowa = mysql_fetch_assoc($resulta)){
									   
									  echo ' <li>
                                        <div class="left-block">
                                            <a href="javascript:;" onClick="detail('.$rowa['id'].')">
                                                <img class="img-responsive" alt="product" src="Shopping_Cart/'.$rowa['image_location'].'" />
                                            </a>
                                            
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="javascript:;" onClick="add_to_cart('.$rowa['id'].')">Add to Cart</a>
												
                                            </div>
                                            <div class="group-price">
                                                <span class="product-new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="javascript:;" onClick="detail('.$rowa['id'].')">'.$rowa['name'].'</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">'.$rowa['price'].'</span>
                                                
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>';
									   
									 }
								?>
                                    
									  
                                    
                                    
                                </ul>
                            </div>
                            <div id="tab-2" class="tab-panel">
                                <ul class="product-list owl-carousel"  data-dots="false" data-loop="true" data-nav = "true" data-margin = "30"  data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                    
                                   <?php
                                 //query to retrieve new items
								 $qb = "SELECT * FROM items WHERE new='New' LIMIT 6,13";
								 $resultb = mysql_query($qb) or die(mysql_error());
								 
								 while($rowb = mysql_fetch_assoc($resultb)){
									   
									  echo ' <li>
                                        <div class="left-block">
                                            <a href="javascript:;" onClick="detail('.$rowb['id'].')">
                                                <img class="img-responsive" alt="product" src="Shopping_Cart/'.$rowb['image_location'].'" />
                                            </a>
                                            
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="javascript:;" onClick="add_to_cart('.$rowb['id'].')">Add to Cart</a>
                                            </div>
                                            <div class="group-price">
                                                <span class="product-sale">SALE</span>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="javascript:;" onClick="detail('.$rowb['id'].')">'.$rowb['name'].'</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">'.$rowb['price'].'</span>
                                                
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>';
									   
									 }
								?>
                                    
                                    
                                </ul>
                            </div>
                            
                      </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 page-top-right">
                <div class="latest-deals">
                    <h2 class="latest-deal-title">latest deals</h2>
                    <div class="latest-deal-content">
                        <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":1}}'>
                            <li>
                                <div class="count-down-time" data-countdown="2017/06/27"></div>
                                <div class="left-block">
                                    <a href="detail.php"><img class="img-responsive" alt="product" src="html/assets/data/ld1.jpg" /></a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                        <span class="colreduce-percentage">(-10%)</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="count-down-time" data-countdown="2017/06/27 9:20:00"></div>
                                <div class="left-block">
                                    <a href="detail.php"><img class="img-responsive" alt="product" src="html/assets/data/ld2.jpg" /></a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                        <span class="colreduce-percentage">(-90%)</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="count-down-time" data-countdown="2017/06/27 9:20:00"></div>
                                <div class="left-block">
                                    <a href="detail.php"><img class="img-responsive" alt="product" src="html/assets/data/ld3.jpg" /></a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail.php">Maecenas consequat mauris</a></h5>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                        <span class="colreduce-percentage">(-20%)</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!---->
<div class="content-page">
    <div class="container">
        <!-- featured category fashion -->
        <div class="category-featured">
            <nav class="navbar nav-menu nav-menu-red show-brand">
              <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-brand"><a href="#"><img alt="fashion" src="html/assets/data/fashion.png" />fashion</a></div>
                  <span class="toggle-menu"></span>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse">           
                  <ul class="nav navbar-nav">
                    <li class="active"><a data-toggle="tab" href="#tab-4">Women</a></li>
                    <li><a data-toggle="tab" href="#tab-5">Men</a></li>
                    <li><a data-toggle="tab" href="#tab-6">Kids</a></li>
                    
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
              <div id="elevator-1" class="floor-elevator">
                    <a href="#" class="btn-elevator up disabled fa fa-angle-up"></a>
                    <a href="#elevator-2" class="btn-elevator down fa fa-angle-down"></a>
              </div>
            </nav>
            <div class="category-banner">
                <div class="col-sm-6 banner">
                    <a href="#"><img alt="ads2" class="img-responsive" src="html/assets/data/ads2.jpg" /></a>
                </div>
                <div class="col-sm-6 banner">
                    <a href="#"><img alt="ads2" class="img-responsive" src="html/assets/data/ads3.jpg" /></a>
                </div>
           </div>
           <div class="product-featured clearfix">
                <div class="banner-featured">
                    <div class="featured-text"><span>featured</span></div>
                    <div class="banner-img">
                        <a href="#"><img alt="Featurered 1" src="html/assets/data/f1.jpg" /></a>
                    </div>
                </div>
                <div class="product-featured-content">
                    <div class="product-featured-list">
                        <div class="tab-container">
                            <!-- tab product -->
                            <div class="tab-panel active" id="tab-4">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                
                                <?php
                                   //query to retrieve new items
								 $q2 = "SELECT * FROM items WHERE person='women' ORDER BY id ASC LIMIT 0,5 ";
								 $result2 = mysql_query($q2) or die(mysql_error());
								 
								 while($row2 = mysql_fetch_assoc($result2)){
									  
									 echo '<li>
                                        <div class="left-block">
                                            <a href="javascript:;" onClick="detail('.$row2['id'].')">
                                            <img class="img-responsive" alt="product" src="Shopping_Cart/'.$row2['image_location'].'"/></a>
                                            
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="javascript:;" onClick="add_to_cart('.$row2['id'].')">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="javascript:;" onClick="detail('.$row2['id'].')">'.$row2['name'].'</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">'.$row2['price'].'</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>';
									 
									 }
								?>
                                    
                                    
                                    
                                </ul>
                            </div>
                            <!-- tab product -->
                            <div class="tab-panel" id="tab-5">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                    
                                   <?php
                                   //query to retrieve new items
								 $q3 = "SELECT * FROM items WHERE person='men' ORDER BY id DESC LIMIT 0,5 ";
								 $result3 = mysql_query($q3) or die(mysql_error());
								 
								 while($row3 = mysql_fetch_assoc($result3)){
									  
									 echo '<li>
                                        <div class="left-block">
                                            <a href="javascript:;" onClick="detail('.$row3['id'].')">
                                            <img class="img-responsive" alt="product" src="Shopping_Cart/'.$row3['image_location'].'"/></a>
                                            
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="javascript:;" onClick="add_to_cart('.$row3['id'].')">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="javascript:;" onClick="detail('.$row3['id'].')">'.$row3['name'].'</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">'.$row3['price'].'</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>';
									 
									 }
								?>
                                
                                </ul>
                            </div>
                            <!-- tab product -->
                            <div class="tab-panel" id="tab-6">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                    
                                   <?php
                                   //query to retrieve new items
								 $q4 = "SELECT * FROM items WHERE person='kids' ORDER BY id ASC LIMIT 0,5 ";
								 $result4 = mysql_query($q4) or die(mysql_error());
								 
								 while($row4 = mysql_fetch_assoc($result4)){
									  
									 echo '<li>
                                        <div class="left-block">
                                            <a href="javascript:;" onClick="detail('.$row4['id'].')">
                                            <img class="img-responsive" alt="product" src="Shopping_Cart/'.$row4['image_location'].'"/></a>
                                            
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="javascript:;" onClick="add_to_cart('.$row4['id'].')">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="javascript:;" onClick="detail('.$row4['id'].')">'.$row4['name'].'</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">'.$row4['price'].'</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>';
									 
									 }
								?>
                                
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
           </div>
        </div>
        <!-- end featured category fashion -->
        <!-- featured category sports -->
        <div class="category-featured">
            <nav class="navbar nav-menu nav-menu-green show-brand">
              <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-brand"><a href="#"><img alt="fashion" src="html/assets/data/fashion.png" />shoes</a></div>
                  <span class="toggle-menu"></span>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse">           
                  <ul class="nav navbar-nav">
                    <li class="active"><a data-toggle="tab" href="#tab-7">Women</a></li>
                    <li><a data-toggle="tab" href="#tab-8">Men</a></li>
                    <li><a data-toggle="tab" href="#tab-9">Kids</a></li>
                    
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
              <div id="elevator-2" class="floor-elevator">
                    <a href="#elevator-1" class="btn-elevator up fa fa-angle-up"></a>
                    <a href="#elevator-3" class="btn-elevator down fa fa-angle-down"></a>
              </div>
            </nav>
            <div class="category-banner">
                <div class="col-sm-6 banner">
                    <a href="#"><img alt="ads2" class="img-responsive" src="html/assets/data/ads6.jpg" /></a>
                </div>
                <div class="col-sm-6 banner">
                    <a href="#"><img alt="ads2" class="img-responsive" src="html/assets/data/ads7.jpg" /></a>
                </div>
           </div>
           <div class="product-featured clearfix">
                <div class="banner-featured">
                    <div class="featured-text"><span>featured</span></div>
                    <div class="banner-img">
                        <a href="#"><img alt="Featurered 1" src="html/assets/data/f2.jpg" /></a>
                    </div>
                </div>
                <div class="product-featured-content">
                    <div class="product-featured-list">
                        <div class="tab-container autoheight">
                            <!-- tab product -->
                            <div class="tab-panel active" id="tab-7">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                    
                                    <?php
                                   //query to retrieve new items
								 $q5 = "SELECT * FROM items WHERE person='women' AND category='shoes' ORDER BY id ASC LIMIT 0,5 ";
								 $result5 = mysql_query($q5) or die(mysql_error());
								 
								 while($row5 = mysql_fetch_assoc($result5)){
									  
									 echo '<li>
                                        <div class="left-block">
                                            <a href="javascript:;" onClick="detail('.$row5['id'].')">
                                            <img class="img-responsive" alt="product" src="Shopping_Cart/'.$row5['image_location'].'"/></a>
                                            
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="javascript:;" onClick="add_to_cart('.$row5['id'].')">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="javascript:;" onClick="detail('.$row5['id'].')">'.$row5['name'].'</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">'.$row5['price'].'</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>';
									 
									 }
								?>
                                    
                                </ul>
                            </div>
                            <!-- tab product -->
                            <div class="tab-panel" id="tab-8">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>

                                     <?php
                                   //query to retrieve new items
								 $q6 = "SELECT * FROM items WHERE person='men' AND category='shoes' ORDER BY id ASC LIMIT 0,5 ";
								 $result6 = mysql_query($q6) or die(mysql_error());
								 
								 while($row6 = mysql_fetch_assoc($result6)){
									  
									 echo '<li>
                                        <div class="left-block">
                                            <a href="javascript:;" onClick="detail('.$row6['id'].')">
                                            <img class="img-responsive" alt="product" src="Shopping_Cart/'.$row6['image_location'].'"/></a>
                                            
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="javascript:;" onClick="add_to_cart('.$row6['id'].')">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="javascript:;" onClick="detail('.$row6['id'].')">'.$row6['name'].'</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">'.$row6['price'].'</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>';
									 
									 }
								?>
                                </ul>
                            </div>
                            
                            <!-- tab product -->
                            <div class="tab-panel" id="tab-9">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>

                                     <?php
                                   //query to retrieve new items
								 $q7 = "SELECT * FROM items WHERE person='kids' AND category='shoes' ORDER BY id ASC LIMIT 0,5 ";
								 $result7 = mysql_query($q7) or die(mysql_error());
								 
								 while($row7 = mysql_fetch_assoc($result7)){
									  
									 echo '<li>
                                        <div class="left-block">
                                            <a href="javascript:;" onClick="detail('.$row7['id'].')">
                                            <img class="img-responsive" alt="product" src="Shopping_Cart/'.$row7['image_location'].'"/></a>
                                            
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="javascript:;" onClick="add_to_cart('.$row7['id'].')">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="javascript:;" onClick="detail('.$row7['id'].')">'.$row7['name'].'</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">'.$row7['price'].'</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>';
									 
									 }
								?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
        <!-- end featured category sports-->
        
        <!-- featured category electronic -->
        
        <!-- end featured category electronic-->
        <!-- featured category Digital -->
        
        <!-- end featured category Digital-->
        <!-- featured category furniture -->
        <div class="category-featured">
            <nav class="navbar nav-menu nav-menu-blue2 show-brand">
              <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-brand"><a href="#"><img alt="fashion" src="html/assets/data/furniture.png" />home and living</a></div>
                  <span class="toggle-menu"></span>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse">           
                  <ul class="nav navbar-nav">
                    <li class="active"><a data-toggle="tab" href="#tab-10">Beddings</a></li>
                    <li><a data-toggle="tab" href="#tab-11">Curtains</a></li>
                    
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
              <div id="elevator-3" class="floor-elevator">
                    <a href="#elevator-2" class="btn-elevator up fa fa-angle-up"></a>
                    <a href="#elevator-4" class="btn-elevator down fa fa-angle-down"></a>
              </div>
            </nav>
            <div class="category-banner">
                <div class="col-sm-6 banner">
                    <a href="#"><img alt="ads2" class="img-responsive" src="html/assets/data/ads12.jpg" /></a>
                </div>
                <div class="col-sm-6 banner">
                    <a href="#"><img alt="ads2" class="img-responsive" src="html/assets/data/ads13.jpg" /></a>
                </div>
           </div>
           <div class="product-featured clearfix">
                <div class="banner-featured">
                    <div class="featured-text"><span>featured</span></div>
                    <div class="banner-img">
                        <a href="#"><img alt="Featurered 1" src="html/assets/data/f5.jpg" /></a>
                    </div>
                </div>
                <div class="product-featured-content">
                    <div class="product-featured-list">
                        <div class="tab-container autoheight">
                            <!-- tab product -->
                            <div class="tab-panel active" id="tab-10">
                                <ul class="product-list owl-carousel"  data-dots="false" data-loop="true" data-nav = "true" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                     <?php
                                   //query to retrieve new items
								 $qc = "SELECT * FROM items WHERE person='home' AND category='Beddings' ORDER BY id ASC LIMIT 0,5 ";
								 $resultc = mysql_query($qc) or die(mysql_error());
								 
								 while($rowc = mysql_fetch_assoc($resultc)){
									  
									 echo '<li>
                                        <div class="left-block">
                                            <a href="javascript:;" onClick="detail('.$rowc['id'].')">
                                            <img class="img-responsive" alt="product" src="Shopping_Cart/'.$rowc['image_location'].'"/></a>
                                            
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="javascript:;" onClick="add_to_cart('.$rowc['id'].')">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="javascript:;" onClick="detail('.$rowc['id'].')">'.$rowc['name'].'</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">'.$rowc['price'].'</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>';
									 
									 }
								?>
                                </ul>
                            </div>
                            <!-- tab product -->
                            <div class="tab-panel" id="tab-11">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                     <?php
                                   //query to retrieve new items
								 $qd = "SELECT * FROM items WHERE person='home' AND category='curtains' ORDER BY id ASC LIMIT 0,5 ";
								 $resultd = mysql_query($qd) or die(mysql_error());
								 
								 while($rowd = mysql_fetch_assoc($resultd)){
									  
									 echo '<li>
                                        <div class="left-block">
                                            <a href="javascript:;" onClick="detail('.$rowd['id'].')">
                                            <img class="img-responsive" alt="product" src="Shopping_Cart/'.$rowd['image_location'].'"/></a>
                                            
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="javascript:;" onClick="add_to_cart('.$rowd['id'].')">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="javascript:;" onClick="detail('.$rowd['id'].')">'.$rowd['name'].'</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">'.$rowd['price'].'</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>';
									 
									 }
								?>                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
           </div>
        </div>
        <!-- end featured category furniture-->
        <!-- featured category jewelry -->
        <div class="category-featured">
            <nav class="navbar nav-menu nav-menu-gray show-brand">
              <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-brand"><a href="#"><img alt="fashion" src="html/assets/data/jewelry.png" />jewellery</a></div>
                  <span class="toggle-menu"></span>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse">           
                  <ul class="nav navbar-nav">
                    <li class="active"><a data-toggle="tab" href="#tab-14">Women</a></li>
                    <li><a data-toggle="tab" href="#tab-15">Men</a></li>
                    
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
              <div id="elevator-4" class="floor-elevator">
                    <a href="#elevator-3" class="btn-elevator up fa fa-angle-up"></a>
                    <a href="#" class="btn-elevator disabled down fa fa-angle-down"></a>
              </div>
            </nav>
            <div class="category-banner">
                <div class="col-sm-6 banner">
                    <a href="#"><img alt="ads2" class="img-responsive" src="html/assets/data/ads14.jpg" /></a>
                </div>
                <div class="col-sm-6 banner">
                    <a href="#"><img alt="ads2" class="img-responsive" src="html/assets/data/ads15.jpg" /></a>
                </div>
           </div>
           <div class="product-featured clearfix">
                <div class="banner-featured">
                    <div class="featured-text"><span>featured</span></div>
                    <div class="banner-img">
                        <a href="#"><img alt="Featurered 1" src="html/assets/data/f6.jpg" /></a>
                    </div>
                </div>
                <div class="product-featured-content">
                    <div class="product-featured-list">
                        <div class="tab-container autoheight">
                            <!-- tab product -->
                            <div class="tab-panel active" id="tab-14">
                                <ul class="product-list owl-carousel"  data-dots="false" data-loop="true" data-nav = "true" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                    <?php
                                   //query to retrieve new items
								 $q10 = "SELECT * FROM items WHERE person='women' AND category='jewellery' ORDER BY id ASC LIMIT 0,5 ";
								 $result10 = mysql_query($q10) or die(mysql_error());
								 
								 while($row10 = mysql_fetch_assoc($result10)){
									  
									 echo '<li>
                                        <div class="left-block">
                                            <a href="javascript:;" onClick="detail('.$row10['id'].')">
                                            <img class="img-responsive" alt="product" src="Shopping_Cart/'.$row10['image_location'].'"/></a>
                                            
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="javascript:;" onClick="add_to_cart('.$row10['id'].')">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="javascript:;" onClick="detail('.$row10['id'].')">'.$row10['name'].'</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">'.$row10['price'].'</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>';
									 
									 }
								?>
                                </ul>
                            </div>
                            <!-- tab product -->
                            <div class="tab-panel" id="tab-15">
                                <ul class="product-list owl-carousel"  data-dots="false" data-loop="true" data-nav = "true" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                    <?php
                                   //query to retrieve new items
								 $q11 = "SELECT * FROM items WHERE person='men' AND category='jewellery' ORDER BY id ASC LIMIT 0,5 ";
								 $result11 = mysql_query($q11) or die(mysql_error());
								 
								 while($row11 = mysql_fetch_assoc($result11)){
									  
									 echo '<li>
                                        <div class="left-block">
                                            <a href="javascript:;" onClick="detail('.$row11['id'].')">
                                            <img class="img-responsive" alt="product" src="Shopping_Cart/'.$row11['image_location'].'"/></a>
                                            
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="javascript:;" onClick="add_to_cart('.$row11['id'].')">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="javascript:;" onClick="detail('.$row11['id'].')">'.$row11['name'].'</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">'.$row11['price'].'</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>';
									 
									 }
								?>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
           </div>
        </div>
        <!-- end featured category jewelry-->
        
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
        <button type="button" class="btn prev-btn pull-left" data-dismiss="modal">Continue Shopping</button> 
        <a href="order.php" class="btn next-btn"> Check Order </a> 
       </div> 
      </div><!-- /.modal-content --> 
    </div>
    
    </div>
        <!-- end banner bottom -->
    </div>
    
    <!-- Baner bottom -->
        <div class="container">


  <div class="modal fade" id="detail_modal" tabindex="-1" role="dialog" aria-labelledby="detail_modalLabel" aria-hidden="true"> 
     <div class="modal-dialog"> 
      <div class="modal-content"> 
       <div class="modal-header" style="border-bottom:none;"> 
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> 
        <h4 class="modal-title" id="detail_modalLabel"> Your Item Details</h4> 
       </div> 
       <div class="modal-body detail_modal_body"><!--modal body--->
           
       </div> <!--end of modal body--->
       <div class="modal-footer"> 
        <button type="button" class="btn prev-btn pull-left" data-dismiss="modal">Continue Shopping</button> 
        <a href="order.php" class="btn next-btn"> Check Order </a> 
       </div> 
      </div><!-- /.modal-content --> 
    </div>
    
    </div>
        <!-- end banner bottom -->
    </div>
                   <div class="modal fade" id="my_mode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
						 <div class="modal-dialog"> 
						  <div class="modal-content"> 
						   <div class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> 
							<h4 class="modal-title" id="myModalLabel"> Home Page</h4> 
						   </div> 
						   <div class="modal-body">
                              <div class="r" >
                              <ul class="tree-menu pull-left col-md-12" style="display:list-item;">
                                <li><span></span>Click on each item to view the item's details. A popup appears to display the details of the chosen item</li>
                                <li><span></span>You can add the item into the cart in the popup or just click the add to cart button attached to the item.</li>
                                <li><span></span>To view a small summary of the item check top header on your right and hover to see a summary of your add and the total price.</li>
                                <li><span></span>To view your order list go to the order page and make adjustments.</li>
                              </ul>
                              </div>
                           </div> 
						   <div class="modal-footer"> 
							 
							<a href="order.php" class="btn next-btn" data-dismiss="modal"> Okay </a> 
						   </div> 
						  </div><!-- /.modal-content --> 
						</div>
						
					</div>
</div>


  


<?php
  footer();
?>

<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>

<!-- Script-->
<script type="text/javascript" src="html/assets/lib/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="html/assets/lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="html/assets/lib/select2/js/select2.min.js"></script>
<script type="text/javascript" src="html/assets/lib/jquery.bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="html/assets/lib/owl.carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="html/assets/lib/jquery.countdown/jquery.countdown.min.js"></script>
<script type="text/javascript" src="html/assets/js/jquery.actual.min.js"></script>
<script type="text/javascript" src="html/assets/lib/fancyBox/jquery.fancybox.js"></script>
<script type="text/javascript" src="html/assets/lib/jquery.elevatezoom.js"></script>
<script type="text/javascript" src="html/assets/js/theme-script.js"></script>
<script type="text/javascript" src="html/assets/js/my-script.js"></script>

</body>

<!-- Mirrored from kutethemes.com/html/kuteshop/html/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 27 Sep 2015 11:12:52 GMT -->
</html>