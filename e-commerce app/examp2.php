<?php
session_start();

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax Cart</title>
<link rel="stylesheet" type="text/css" href="html/assets/lib/bootstrap/css/bootstrap.min.css" />
    <title>Your Order - Suzie's Shop</title>
   <script type="text/javascript" src="html/assets/lib/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="html/assets/lib/bootstrap/js/bootstrap.min.js"></script>
<script>
    
	window.onload = setupRefresh;
	
	function setupRefresh(){
		 view_cart();
	setInterval("view_cart();",5000);
	//also add the small view cart at the top header
		}
	
    function add_to_cart(num){
       $.post('examp3.php',{task:"add",num:num},function(data){
         //alert(data);
		 $('.modal-body').html(data);
		 $('#myModal').modal({ keyboard: true });
       });
    }
    
    function show_cart(){
       $.post('examp3.php',{task:"display_items"},function(data){
         alert(data);
       });
    }

   function empty_cart(){
       $.post('examp3.php',{task:"empty"},function(data){
        alert(data);
       });
    }
	function view_cart(){
       $.post('examp3.php',{task:"show"},function(data){
        $('#info').html(data);
       });
	}
	   
	function updateQuantities(id){
		 //get the new quantity
		
		var d = id;
		 
		 var new_qty = $('#box_'+d).val();
		  //unique id of this product
		 var id = $('#box_'+d).parent().parent().attr("id");
		 
		 $.post('examp3.php', {task:"update_qty",new_qty:new_qty,id:id}, function(data){
				
				$('.cart_total_price').html(data);
				});
				
		$.post('examp3.php', {task:"update_qty2",new_qty:new_qty,id:id}, function(data){
				
				$('#sub_'+d).html(data);
				
				
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
			$.post('examp3.php', {task:"delete_item",d:d}, function(){
				//use jquery to remove the item from the page
				$(d).remove();
				});
			
			
			}
	}
	function delete_item(id){
		var d = id;
		
		//use ajax to remove this item from session
			$.post('examp3.php', {task:"delete_item",d:d}, function(){
				//use jquery to remove the item from the page
				$("#"+d).fadeOut();
				});
			
	}
		 

</script>
<style>
   .my_ul{
	  width:200px;
	  height:auto;
	  border:2px solid #666;
	  padding:5px;
	  display:block;
	  text-align:center;   
	 }
	 .my_ul li{
	   list-style:none;
	   border-bottom:1px solid #666;
	   color:#fff;
	   background-color:#CCC;	 
		}
	.my_ul li a{
      text-decoration:none;		
	}
</style>
</head>

<body onLoad="view_cart()">
<div class="container">
  <div class="row">
     <div class="col-md-4">
       <div class="col-sm-6">
        <h4>Shoe</h4>
        <a href="javascript:;" onClick="add_to_cart('Shoe')" class="btn btn-primary">Add To cart</a>
        </div>
        
        <div class="col-sm-6">
        <h4>Cup</h4>
        <a href="javascript:;" onClick="add_to_cart('Cup')" class="btn btn-primary">Add To car</a>
        </div>
        
     </div>
     <div class="col-md-4">
        <h4>Empty</h4>
        <a href="javascript:;" onClick="empty_cart()"       class="btn btn-primary">Empty cart</a>
     </div>

<div class="col-md-4">
        <h4>Show</h4>
        <a href="javascript:;" onClick="show_cart()" class="btn btn-primary">show the cart</a>
     </div>


  </div>

  <div class="row">
    <div id="info" class="col-md-12" ></div>
  </div>
</div>
<!-- Button trigger modal --> <button class="btn btn-primary btn-lg" data-toggle="modal1" data-target="#myModal1"> Launch demo modal </button>
<button class="btn btn-primary btn-lg" id="nclick">now click</button>
<!-- Modal --> 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
 <div class="modal-dialog"> 
  <div class="modal-content"> 
      <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
            Cart details
        </button> 
        <h4 class="modal-title" id="myModalLabel"> This Modal title </h4> 
      </div> 
     <div class="modal-body"> Press ESC button to exit. </div> 
     <div class="modal-footer"> 
     <button type="button" class="btn btn-default" data-dismiss="modal">Close </button> 
     <button type="button" class="btn btn-primary"> Submit changes </button> 
     </div> 
</div>
<!-- /.modal-content --> 
</div>
<!-- /.modal-dialog --> 
</div><!-- /.modal -->
  <div class="container">
 <div class="row">
 
                         <select style="padding:8px;" class="sel">
					      <option class="no" value="not fullfilled">Not Fullfilled</option>
					      <option  class="no" value="fullfilled">Fullfilled</option>
					 </select>
                     <button class="b">clear</button>
 </div>
 </div>
<script> 
$(function () { 
   
   $('.sel').on('change', function() {
       var value = $(this).val();
        alert(value);
     });
	 
	/*$('.my_ul').hover(function(){
	   $('.cola2').slideToggle();	
	});*/
	 
});
 
</script>

<div class="container">
  <div class="row">
  
     <!--<div class="panel-group" id="accordion"> 
      <div class="panel panel-default"> 
       <div class="panel-heading"> 
        <h4 class="panel-title"> 
         <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Click me  1 </a> 
        </h4> 
       </div> 
      <div id="collapseOne" class="panel-collapse collapse in"> 
       <div class="panel-body"> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. </div>
      </div> 
     </div> -->
     
     
  </div>
  <div class="row">
  
     <ul class="my_ul" role="menu" aria-labelledby="dropdownMenu1"> 
      <li role="presentation" class="cola1"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Number of Units</a> </li> 
          <div id="collapseTwo" class="collapse cola2">
              <li role="presentation"> <a role="menuitem" tabindex="-1" href="#">Data Mining</a> </li> 
              <li role="presentation"> <a role="menuitem" tabindex="-1" href="#"> Data Communication/Networking </a> </li> 
              <!--<li role="presentation" class="divider"></li>-->
               <li role="presentation"> <a role="menuitem" tabindex="-1" href="#">Separated link</a> </li> 
           </div>
           
              <li role="presentation"> <a role="menuitem" tabindex="-1" href="#">not that one </a> </li> 
              <li role="presentation"> <a role="menuitem" tabindex="-1" href="#"> scuba diving  </a> </li> 
              <li role="presentation"> <a role="menuitem" tabindex="-1" href="#">marine watching</a> </li> 
              <li role="presentation"> <a role="menuitem" tabindex="-1" href="#"> fishing </a> </li> 
              <li role="presentation"> <a role="menuitem" tabindex="-1" href="#">milking</a> </li> 
              <li role="presentation"> <a role="menuitem" tabindex="-1" href="#">running </a> </li> 
     </ul>
     
  </div>
</div>
</body>
</html>