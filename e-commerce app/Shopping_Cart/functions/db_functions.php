<?php
    ob_start();
	session_start();
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'root';
	$dbname = 'clothes_db';

	$db = mysql_connect($dbhost, $dbuser, $dbpass) or mysql_error();
	
	$d = mysql_select_db($dbname, $db);	
	
	
	function loggedin()
	{
	  if(isset($_SESSION['user']) && !empty($_SESSION['user']))
	    {
		  return true;
		}else{
		   return false;	
		}	
	}
	function top_header(){
		
		echo '<div class="top-header">
        <div class="container">
            <div class="nav-top-links">
                
                <a href="#"><img alt="email" src="html/assets/images/email.png" />Contact us today!</a>
                <a href="#">Mpesa PayBill #:121212</a>
                <a class="" href="#"><img alt="phone" src="html/assets/images/phone.png"/> Support :(+254) 710 842 986 </a>
            </div>
            
            
            
            

            <div id="user-info-top" class="user-info pull-right">
                <div class="dropdown">
                    <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>My Account</span></a>
                    <ul class="dropdown-menu mega_dropdown" role="menu">
                        <li><a href="Clothe Site/index.php">Login</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>';
		
		}
		
	function main_header(){
		   
	echo '<div class="container main-header">
        <div class="row" style="margin-bottom:0px;padding-bottom:0px;">
            <div class="col-xs-12 col-sm-3 logo">
                <a href="index.php"><img alt="Suzie\'s Shop" src="html/assets/images/suz.png" /></a>
            </div>
            <div class="col-xs-7 col-sm-7 header-search-box">
			  
                <form class="form-inline">
                      <div class="form-group form-category">
                        <select class="select-category">
                            <option value="2">All Categories</option>
                            <option value="1">Men</option>
                            <option value="2">Women</option>
                        </select>
                      </div>
                      <div class="form-group input-serach">
                        <input type="text"  placeholder="Keyword here...">
                      </div>
                      <button type="submit" class="pull-right btn-search"></button>
					  
					  
					  
					  
                </form>
				 
				
            </div>';
			    
			
            echo '<div id="cart-block" class="col-xs-5 col-sm-2 shopping-cart-box">
			
                <a class="cart-link" href="order.php">
                    <span class="title">Shopping cart</span>
                    <span class="total"></span>
                    <span class="notify notify-left"></span>
                </a>
                <div class="cart-block">
                    <div class="cart-block-content">
                        <h5 class="cart-title"></h5>
                        
                    </div>
                </div>
				
            </div>
			
			  
			
        </div>
        
    </div>';
		   
		}
	
	function footer_text(){
		echo 'Copyrights &#169 '. date('Y').' Cydno Tech. All Rights Reserved. Designed by KuteThemes.com';
		}
		
		/*
		  name = cat_name from categories table
		  cat = Person in the categories table
		*/
		
		function footer(){
			echo '<!-- Footer -->
<footer id="footer">
     <div class="container">
            <!-- introduce-box -->
            <div id="introduce-box" class="row">
                <div class="col-md-3">
                    <div id="address-box">
                        <a href="#"><img alt="Kute Shop" src="html/assets/images/suz.png" width="200"/></a>
                        <div id="address-list">
                            <div class="tit-name">Address:</div>
                            <div class="tit-contain">Example Street 68, Mahattan, New York, USA.</div>
                            <div class="tit-name">Phone:</div>
                            <div class="tit-contain">+00 123 456 789</div>
                            <div class="tit-name">Email:</div>
                            <div class="tit-contain">support@business.com</div>
                        </div>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="introduce-title">Company Profile</div>
                            <ul id="introduce-company"  class="introduce-list">
							    <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About Us</a></li>
                                <li><a href="about.php">Testimonials</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <div class="introduce-title">Who We are?</div>
                            <p>Suzzie\'s Online Shop is one stop shopping center that allows you to buy and order clothes at the comfort of your home sofa. </p>
                        </div>
                        <div class="col-sm-4">
                            <div class="introduce-title">Support</div>
                            <ul id = "introduce-support"  class="introduce-list">
                                <li><a href="category2.php?cat=men">Men\'s Fashions</a></li>
                                <li><a href="category2.php?cat=women">Women\'s Fashions</a></li>
								<li><a href="category2.php?cat=kids">Kid\'s Fashions</a></li>
								<li><a href="category2.php?cat=other">Other\'s Fashions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div id="contact-box">
                        
                        <div class="introduce-title">Join Us</div>
                        <div class="social-link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            <a href="#"><i class="fa fa-vk"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                    
                </div>
            </div><!-- /#introduce-box -->
        
            <!-- #trademark-box -->
            <!-- /#trademark-box -->
            
            <!-- #trademark-text-box -->
            <!-- /#trademark-text-box -->
            <!-- /#footer-menu-box -->
            <p class="text-center">';
			echo footer_text();
			echo '</p>
        </div> 
</footer>';
			
			}
?>