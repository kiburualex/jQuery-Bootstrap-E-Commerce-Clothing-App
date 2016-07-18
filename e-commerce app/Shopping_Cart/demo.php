<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Admin Panel</title>

<link rel="stylesheet" type="text/css" href="css/demo.css" />
<!--Boostrap--->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">


<script type="text/javascript" src="js/jquery1.11.3.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

<script type="text/javascript" src="js/script.js"></script>

</head>

<body>
<div class="container">
<div class="row"><!--=======NAVBAR=========-->
    <nav class="navbar navbar-default" role="navigation"> 
       <div class="navbar-header"> 
        <a class="navbar-brand" href="#">The Admin Panel</a> 
       </div> 
     <div> 
      
     </div> 
   </nav>
</div><!--=======END OF NAV=========-->
<div class="row"><!--=======THE SECOND ROW=========-->
<div id="col-md-3"><!--=======LEFT COLUMN=========-->

  <ul class="container1">
      <li class="menu1">
      
          <ul>
		   <li class="button1"><a href="#" class="green">Men </a></li>

            <li class="dropdown1">
                <ul>
                    <a href="#" onclick="$('.button1 a').eq(2).click();return false;"><li>Add Item</li></a>
                    <a href="#" onclick="$('.dropdown1').slideUp('slow');return false;"><li>view Items</li></a>
                    
                </ul>
			</li>

          </ul>
          
      </li>
      
      <li class="menu1">
      
          <ul>
		    <li class="button1"><a href="#" class="orange">Women <span></span></a></li>          	

            <li class="dropdown1">
                <ul>
                    <li><a href="#" onclick="$('.button a:last').click();return false;">Add Item</a></li>
                    <li><a href="http://en.wikipedia.org/wiki/Orange_%28fruit%29">View Items</a></li>
                    
                </ul>
			</li>

          </ul>
          
      </li>

      
      <li class="menu1">
      
          <ul>
		    <li class="button1"><a href="#" class="blue">Kids <span></span></a></li>

            <li class="dropdown1">
                <ul>
                    <li><a href="http://en.wikipedia.org/wiki/Grapes">Add Item</a></li>
                    <li>View Items</li>
                   
                    
                </ul>
			</li>

          </ul>
          
      </li>

    
      <li class="menu1">
      
          <ul>
		    <li class="button1"><a href="#" class="red">Categories <span></span></a></li>

            <li class="dropdown1">
                <ul>
                    <li><a href="http://en.wikipedia.org/wiki/Strawberry">Add Category</a></li>
                    <li><a href="http://www.flickr.com/photos/mojeecat/368540120/">View Categories</a></li>
                    
                </ul>
			</li>

          </ul>
          
      </li>
  </ul>

</div><!--=======END OF LEFT COLUMN=========-->
    <div class="col-md-9 pull-right" style="padding-top:20px;"><!--=======RIGHT COLUMN=========-->
      <div class="row">
          <div class="alert alert-info">
			    <span class="label label-info">NOTE!</span>
				<span> This is a Content Management System to manage the addition, edition and deletion of Boutique stuff. </span>
													</div>
      </div>
    </div><!--=======END OF RIGHT COLUMN=========-->
</div><!--=======END OF SECOND ROW=========-->

 </div><!--=======END CONTAINER=========-->   
</body>
</html>
