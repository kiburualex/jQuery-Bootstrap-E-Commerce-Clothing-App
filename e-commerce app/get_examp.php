<?php
session_start();

   //$cart_id = $_POST['id'];
	$id = $_GET['id'];
   
//cart() without modal	   
	function cart(){
	 $cart_id = $_GET['add_item'];
	   //echo 'Include this in the cart'.$cart_id;
	   
	   if(isset($cart_id)){
		 $_SESSION['cart_'.(int)$cart_id]+='1';
		echo 'You now have '.$_SESSION['cart_'.(int)$cart_id].' item(s).';	 
		 }
		   
	   }
 //cart()2 with modal function
 function cart2(){
	 $cart_id = $_GET['add_item'];
	   //echo 'Include this in the cart'.$cart_id;
	   
	   if(isset($cart_id)){
		 $_SESSION['cart_'.(int)$cart_id]+='1'; 

		 echo '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
		 <div class="modal-dialog"> 
		  <div class="modal-content"> 
		   <div class="modal-header"> 
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> 
			<h4 class="modal-title" id="myModalLabel"> This Modal title</h4> 
		   </div> 
		   <div class="modal-body"> You Now have '.$_SESSION['cart_'.(int)$cart_id].' Item(s) in your cart</div> 
		   <div class="modal-footer"> 
			<button type="button" class="btn btn-default" data-dismiss="modal">Close </button> 
			<button type="button" class="btn btn-primary"> Submit changes </button> 
		   </div> 
		  </div><!-- /.modal-content --> 
		</div>';
		
	   }
		   
}
 
	   
//session_destroy();

   switch($id){
	     case 1:
               cart();
		 break;
		 case 2:
           echo 'Clicked through id 2';
		 break;
		 case 3:
			 echo cart2();
		 break;
		 default:
		    echo 'Sorry';		   
	   }
?>